<?php

namespace App\Notifications;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;


class UserDBNotify extends Notification
{
    use Queueable;
    private $utilisateur,$operation;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $utilisateur,$operation)
    
    {
        $this->utilisateur=$utilisateur;
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
        $message='';
        if ($this->operation =='deleteFondateur'){
            $message ="a supprimer un fondateur";
        } 
        elseif ($this->operation =='deleteInvestisseur'){
            $message ="a supprimer un investisseur";
        }

        

        return [
            // 'data' => $this->secteur['body']
            'id'=> $this-> utilisateur-> id,
            'title'=>$message,
            'user'=>Auth::user()->name,
            'image'=>Auth::user()->image,
            'operation' => $this->operation,
            
        ];
    }
}
