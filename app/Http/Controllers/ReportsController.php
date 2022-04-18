<?php

namespace App\Http\Controllers;

use App\Jobs\AdminReport;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('reports.index');
    }

    public function total()
    {
        return view('reports.total');
    }

    public function create(Request $request)
    {
        $validated = $this->validate(request(), [
            'requested' => 'required',
        ]);

        AdminReport::dispatch($validated, auth()->user());

        return back()->with('status', 'Report created!');
    }
}
