<?php

namespace App\Http\Controllers;

class DefisController extends Controller
{
    /**
     * Page Défis (UI complète intégrée au même layout Laravel que Scan).
     */
    public function index()
    {
        return view('defis');
    }
}
