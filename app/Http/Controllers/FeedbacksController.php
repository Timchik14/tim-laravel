<?php

namespace App\Http\Controllers;

use App\Models\Message;

class FeedbacksController extends Controller
{
    public function create()
    {
        return view('contacts.contacts');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email:rfc,dns',
            'message' => 'required',
        ]);
        Message::create(request()->all());
        return redirect(route('contacts'))->with('status', 'Message sent!');
    }

    public function show()
    {
        $messages = Message::latest()->get();
        return view('admin.feedback', compact('messages'));
    }
}
