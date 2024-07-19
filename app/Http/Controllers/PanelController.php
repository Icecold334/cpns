<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    // index
    public function index()
    {
        return view('panel.index', ['title' => 'Dashboard ']);
    }
}
