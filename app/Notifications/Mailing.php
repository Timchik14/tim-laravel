<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Mailing extends Notification
{
    use Queueable;

    protected $articles;
    protected $days;

    public function __construct($articles, $days)
    {
        $this->articles = $articles;
        $this->days = $days;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New articles')
            ->line('created.')
            ->action('To article', url('/'))
            ->lines([1, 2])
            ;
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
