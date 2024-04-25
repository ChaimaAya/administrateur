<?php

namespace App\Notifications;

use App\Models\Startup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;


class StartupDBNotify extends Notification
{
    use Queueable;
    private $startup,$operation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Startup $starup,$operation)
    {
        $this->startup= $starup;
        $this->operation= $operation;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
   

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDataBase($notifiable)
    { 
        

        

        return [
            // 'data' => $this->secteur['body']
            'id'=> $this-> startup-> id,
            'title'=>'a supprimer un startup',
            'user'=>Auth::user()->name,
            'image'=>Auth::user()->image,
            'operation' => $this->operation,

        ];
    }
}
