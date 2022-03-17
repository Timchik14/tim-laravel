<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;

class Mailing extends Command
{
    protected $signature = 'app:mailing {days}';

    protected $description = 'Sending emails to users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $days = $this->argument('days');
        $articles = Article::whereDay('created_at', '>', date('d') - $days)->get();
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new \App\Notifications\Mailing($articles, $days));
        }
    }
}
