<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events\NewMessageToMarketer;
use App\Models\Admin;
use \App\Models\Message;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $admin_id;
    public function __construct()
    {
        $this->admin_id= Admin::first()->id;
    }

    public function index()
    {
        $contacts= Marketer::get();
        $unreadIds=Message::select(DB::raw("`from` as sender_id ,count(`from`) as messages_count"))
            ->where('read',false)
            ->where('to',$this->admin_id)
            ->where('is_admin',false)
            ->groupBy('from')
            ->get();
        $contacts= $contacts->map(function ($contact) use ($unreadIds){
            $contactUnread = $unreadIds->where('sender_id',$contact->id)->first();
            $contact->unread=$contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }
    public function getMessagesFor($id){

        Message::where('from',$id)->where('to',$this->admin_id)->update(['read'=>true]);
        $messages =Message::where(function ($q) use ($id){
            $q->where('from',$this->admin_id);
            $q->where('to',$id);
        })
            ->orWhere(function ($q) use ($id){
            $q->where('from',$id);
            $q->where('to',$this->admin_id);
        })
        ->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message=Message::create([
            'from'=>$this->admin_id,
            'to'=>$request->contact_id,
            'text'=>$request->text,
            'is_admin'=> true
        ]);
        broadcast(new NewMessageToMarketer($message));
        return response()->json($message);
    }
}
