<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    // index
    public function index()
    {
        $pakets = Paket::where('status', true)->get();
        return view('panel.index', ['title' => 'Dashboard ', 'pakets' => $pakets]);
    }
}
