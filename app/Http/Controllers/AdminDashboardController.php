<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Defi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'produitsCount' => Produit::count(),
            'defisCount' => Defi::count(),
        ]);
    }
}