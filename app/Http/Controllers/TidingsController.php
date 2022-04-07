<?php

namespace App\Http\Controllers;

use App\Http\Requests\TidingRequest;
use App\Models\Tiding;
use Illuminate\Http\Request;

class TidingsController extends Controller
{
    public function index()
    {
        $tidings = Tiding::with('user')->latest()->published()->simplePaginate(10);
        return view('tidings.index', compact('tidings'));
    }

    public function create(Tiding $tiding)
    {
        return view('tidings.create', compact('tiding'));
    }

    public function store(TidingRequest $tidingRequest)
    {
        $validated = $tidingRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);
        $validated['owner_id'] = auth()->id();

        Tiding::create($validated);
        return redirect(route('tidings.index'))->with('status', 'Tiding saved!');
    }

    public function show(Tiding $tiding)
    {
        return view('tidings.show', compact('tiding'));
    }

    public function edit(Tiding $tiding)
    {
        $this->authorize('update', $tiding);

        return view('tidings.edit', compact('tiding'));
    }

    public function update(Tiding $tiding, TidingRequest $tidingRequest)
    {
        $validated = $tidingRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);

        $tiding->update($validated);

        return redirect(route('tidings.index'))->with('status', 'Tiding changed!');
    }

    public function destroy(Tiding $tiding)
    {
        $tiding->delete();

        return redirect(route('tidings.index'))->with('status', 'Tiding deleted!');
    }
}
