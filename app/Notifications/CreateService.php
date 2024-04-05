<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateService extends Notification
{
    use Queueable;

    private $category_name;
    private $service_name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($category_name, $service_name)
    {
        $this->category_name = $category_name;
        $this->service_name = $service_name;
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
            'category_name' => $this->category_name,
            'service_name' => $this->service_name,
            'provider_id' => auth('provider')->user()->id,
            'provider_name' => auth('provider')->user()->name,
        ];
    }
}
