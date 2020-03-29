<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
class NotificationController extends Controller
{
    public function get(){
        #return Notification::all();
        $unreadNotifications = Auth::user()->unreadNotifications;
        $fechaActual = date('Y-m-d');
        foreach ($unreadNotifications as $notification) {
            if ($fechaActual != $notification->created_at->toDateString()) {
                $notification->markAsRead();
            }
        }
        return Auth::user()->unreadNotifications;
    }
}
