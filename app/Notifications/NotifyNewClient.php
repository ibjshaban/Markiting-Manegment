<?php

namespace App\Notifications;

use App\Models\Marketer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Cleint;
class NotifyNewClient extends Notification
{
    use Queueable;

    public $client;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cleint $client)
    {
        $this->client = $client;
        //dd($client);
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        $marketer_id = $this->client->marketer_id;
        $marketer = Marketer::select('name_ar')->where('id', $marketer_id)->get();
        return [
            'clients' => $this->client,
            'marketer' => $marketer[0]->name_ar,
        ];
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
            //
        ];
    }
}
