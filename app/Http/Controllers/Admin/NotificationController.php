<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\DataTables\AdminsDataTable;

class NotificationController extends Controller
{
    public function __construct()
    {
        $marketers = Marketer::all();

        $notifications = DatabaseNotification::where('read_at','=', null)->get();
        View::share('notifications', $notifications);
    }

   public function get(){
       $notifications = DatabaseNotification::where('read_at','=', null)->get();
       return $notifications;
   }
   public function read(Request $request){
       DatabaseNotification::where('read_at','=', null)->find($request->id)->update(['read_at' => time()]);
       return 'success';
   }

    public function markNotification(Request $request)
    {
        Auth::guard('admin')
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
