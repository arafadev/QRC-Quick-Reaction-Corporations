<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateCategory extends Notification
{
    use Queueable;
    private $category_id;
    private $category_name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($category_id, $category_name)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'category_id' => $this->category_id,
            'category_name' => $this->category_name,
            'provider_name' => auth('provider')->user()->name,
            'provider_id' => auth('provider')->user()->id,

        ];
    }
}
