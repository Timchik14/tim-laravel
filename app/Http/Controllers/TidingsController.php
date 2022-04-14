<?php

namespace App\Http\Controllers;

use App\Http\Requests\TidingRequest;
use App\Models\Comment;
use App\Models\Tiding;
use App\Services\TagsSynchronizer;

class TidingsController extends Controller
{
    public function index()
    {
        $tidings = Tiding::with('tags')->latest()->published()->simplePaginate(10);
        return view('tidings.index', compact('tidings'));
    }

    public function create(Tiding $tiding)
    {
        return view('tidings.create', compact('tiding'));
    }

    public function store(TidingRequest $tidingRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $tidingRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);
        $validated['owner_id'] = auth()->id();

        $tiding = Tiding::create($validated);

        $tags = $tidingRequest->getTags();
        $tagsSynchronizer->sync($tags, $tiding);

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

    public function update(Tiding $tiding, TidingRequest $tidingRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $tidingRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);

        $tiding->update($validated);

        $tags = $tidingRequest->getTags();
        $tagsSynchronizer->sync($tags, $tiding);

        return redirect(route('tidings.index'))->with('status', 'Tiding changed!');
    }

    public function destroy(Tiding $tiding)
    {
        $tiding->delete();

        return redirect(route('tidings.index'))->with('status', 'Tiding deleted!');
    }

    public function comment(Tiding $tiding)
    {
        $validated = $this->validate(request(), [
            'text' => 'required',
        ]);
        $validated['user_id'] = auth()->id();
        $comment = new Comment($validated);
        $tiding->comments()->save($comment);
        return back()->with('status', 'Comment created!');
    }
}
