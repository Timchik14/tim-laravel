<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tiding;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->count(5)->create();
        User::factory()
            ->count(2)
            ->create()
            ->each(function (User $user) {
                $user->articles()->saveMany(Article::factory()
                    ->count(10)
                    ->make());
            })->each(function (User $user) {
                $user->articles()->saveMany(Tiding::factory()
                    ->count(10)
                    ->make());
            });
        Article::all()->each(function (Article $article) {
            $article->tags()->attach(Tag::all()->random(3));
        });
        Tiding::all()->each(function (Tiding $tiding) {
            $tiding->tags()->attach(Tag::all()->random(3));
        });
    }
}
