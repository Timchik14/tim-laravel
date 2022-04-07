<?php

namespace App\Http\Controllers;

use App\Models\Tiding;
use Illuminate\Http\Request;

class AdminsTidingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(Tiding $tiding)
    {
        return view('tidings.show', compact('tiding'));
    }

    public function showTidings()
    {
        $tidings= Tiding::with('user')->latest()->simplePaginate(20);
        return view('tidings.index', compact('tidings'));
    }

    public function edit(Tiding $tiding)
    {
        return view('tidings.edit', compact('tiding'));
    }
}
