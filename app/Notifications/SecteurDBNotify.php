<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Secteur;
use Illuminate\Support\Facades\Auth;

class SecteurDBNotify extends Notification
{
    use Queueable;
    // public $secteur;
    private $secteurs,$operation;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Secteur $secteurs,$operation)
    {
        $this->secteurs= $secteurs;
        $this->operation= $operation;

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
    public function toDataBase($notifiable)
    { 
        $message='';
        if ($this->operation =='create'){
            $message ="a ajouter un secteur";
        } 
        elseif ($this->operation =='update'){
            $message ="a modifier un secteur";
        }
        elseif ($this->operation =='delete'){
            $message ="a supprimer un secteur";
        } 
        

        return [
            // 'data' => $this->secteur['body']
            'id'=> $this-> secteurs-> id,
            'title'=>$message,
            'user'=>Auth::user()->name,
            'image'=>Auth::user()->image,
            'operation' => $this->operation,
            
        ];
    }
}
