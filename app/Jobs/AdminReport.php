<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Tiding;
use App\Models\User;
use App\Notifications\ReportCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $request;
    protected $user;

    public function __construct($request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function handle()
    {
        $report = '';

        $request = array_values($this->request['requested']);

        foreach ($request as $item) {
            switch ($item) {
                case 'news':
                    $report .= 'News: ' . DB::table('tidings')->count() . PHP_EOL;
                    break;
                case 'articles':
                    $report .= 'Articles: ' . DB::table('articles')->count() . PHP_EOL;
                    break;
                case 'comments':
                    $report .= 'Comments: ' . DB::table('comments')->count() . PHP_EOL;
                    break;
                case 'tags':
                    $report .= 'Tags: ' . DB::table('tags')->count() . PHP_EOL;
                    break;
                case 'users':
                    $report .= 'Users: ' . DB::table('users')->count() . PHP_EOL;
                    break;
            }
        }
        $this->user->notify(new ReportCreated($report));
    }
}
