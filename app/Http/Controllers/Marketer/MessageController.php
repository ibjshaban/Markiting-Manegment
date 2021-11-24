<?php

namespace App\Http\Controllers\Marketer;

use App\Http\Controllers\Controller;
use App\Events\NewMessageToAdmin;
use App\Models\Admin;
use \App\Models\Message;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    protected $admin_id;
    public function __construct()
    {
        $this->admin_id= Admin::first()->id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact= Admin::first();
        $unread_messages=Message::where('read' , 0)->where('to' , auth('marketer')->id())
            ->where('is_admin',true)->where('from',$contact->id)->count();

        $contact->unread= $unread_messages ;
        return response()->json([$contact,$unread_messages]);
    }
    public function getMessagesFor($id){

        Message::where('from',$id)->where('to',auth('marketer')->id())->update(['read'=>true]);
        $messages =Message::where(function ($q) use ($id){
            $q->where('from',auth('marketer')->id());
            $q->where('to',$id);
        })
            ->orWhere(function ($q) use ($id){
            $q->where('from',$id);
            $q->where('to',auth('marketer')->id());
        })
        ->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message=Message::create([
            'from'=> auth('marketer')->id(),
            'to'=> $this->admin_id,
            'text'=>$request->text,
            'is_admin'=> false
        ]);
        broadcast(new NewMessageToAdmin($message));
        return response()->json($message);
    }
}
