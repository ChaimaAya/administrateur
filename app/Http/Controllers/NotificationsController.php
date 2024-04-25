<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

class NotificationsController extends Controller
{
    
   
    public function index()
    {
        // 

    }
    public function MarkAsRead_all()
    {
        $UserUnreadNotifications = Auth::user()->unreadNotifications;
        // dd($UserUnreadNotifications);

        if($UserUnreadNotifications)
        {
            $UserUnreadNotifications->markAsRead();
            return back();
        }

    }
    public function MarkAsRead($id)
    {
        if($id){
            auth()->user()->notifications->where('id',$id)->markAsRead();
        }
        return back();
       
    }

    

    
}
