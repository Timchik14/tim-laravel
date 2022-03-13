<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Article;

class FeedbacksController extends Controller
{
    // сделать проверку на админа

    public function index()
    {
        return view('admin.index');
    }

    public function adminShowArticles()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('articles.index', compact('articles'));
    }

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
        return redirect(route('contacts'));
    }

    public function show()
    {
        $messages = Message::latest()->get();
        return view('admin.feedback', compact('messages'));
    }
}
