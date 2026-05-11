<?php

namespace Tests\Feature;

use App\Models\ImpactAction;
use App\Models\User;
use Database\Seeders\DemoProduitSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ScanFlowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DemoProduitSeeder::class);
    }

    public function test_scan_hub_requires_authentication(): void
    {
        $this->get(route('scan'))->assertRedirect();
    }

    public function test_authenticated_user_sees_scan_hub_then_can_search_demo_barcode(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('scan'))
            ->assertOk()
            ->assertSee('Scanner un produit')
            ->assertSee('Ouvrir le scanner');

        $this->actingAs($user)
            ->get(route('scanner'))
            ->assertOk()
            ->assertSee('Scan Intelligent');

        $this->actingAs($user)
            ->post(route('scan.search'), [
                'code_barre' => '1234567890123',
                '_token' => csrf_token(),
            ])
            ->assertOk()
            ->assertSee('Pause fraîche BIO')
            ->assertSee('ÉcoSnack')
            ->assertSee('Résultat du scan');

        $this->assertDatabaseHas('impact_actions', [
            'user_id' => $user->id,
            'type' => 'scan',
        ]);
    }

    public function test_unknown_barcode_returns_to_scanner_with_flash(): void
    {
        Http::fake([
            'world.openfoodfacts.org/*' => Http::response([
                'status' => 0,
                'status_verbose' => 'product not found',
                'product' => null,
            ], 200),
            'api.upcitemdb.com/*' => Http::response([
                'code' => 'INVALID_UPC',
                'total' => 0,
                'items' => [],
            ], 200),
        ]);

        $user = User::factory()->create();

        $before = ImpactAction::where('user_id', $user->id)->count();

        $this->actingAs($user)
            ->from(route('scanner'))
            ->post(route('scan.search'), ['code_barre' => '0000000000000'])
            ->assertRedirect(route('scanner'))
            ->assertSessionHas('error');

        $this->assertSame($before, ImpactAction::where('user_id', $user->id)->count());
    }

    public function test_open_food_facts_used_when_not_in_local_database(): void
    {
        Http::fake([
            'world.openfoodfacts.org/*' => Http::response([
                'status' => 1,
                'product' => [
                    'product_name_fr' => 'Thon à huile TM',
                    'brands' => 'Safiet',
                    'categories' => 'Condiments,M conserves,Pêche',
                    'countries' => 'Tunisia,France',
                    'countries_tags' => ['en:tunisia'],
                    'ecoscore_grade' => 'b',
                    'nutriscore_grade' => 'c',
                    'ingredients_text_fr' => 'Thon, huile',
                    'packaging' => 'métal',
                    'image_front_url' => 'https://example.test/img.jpg',
                ],
            ], 200),
        ]);

        $user = User::factory()->create();

        $barcodeNotSeeded = '8765432109876';

        $this->actingAs($user)
            ->post(route('scan.search'), ['code_barre' => $barcodeNotSeeded])
            ->assertOk()
            ->assertSee('Thon à huile TM')
            ->assertSee('Open Food Facts')
            ->assertSee('Référencé comme vendu en Tunisie');
    }

    public function test_invalid_short_barcode_returns_error(): void
    {
        Http::fake();

        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('scan.search'), ['code_barre' => '123'])
            ->assertRedirect(route('scanner'))
            ->assertSessionHas('error');

        Http::assertNothingSent();
    }
}
