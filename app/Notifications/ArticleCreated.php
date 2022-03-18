<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleCreated extends Notification
{
    use Queueable;

    public $article;

    public function __construct($article)
    {
        $this->article = $article;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Article created.')
                    ->line($this->article->name . ' created.')
                    ->action('To article', url(route('articles.show', ['article' => $this->article])));
    }
}
