<?php

namespace App\Http\Controllers\Marketer;

use App\Http\Controllers\Controller;
use Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('admin.marketer.contact');
    }

    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
//dd($request->get('name'));
        /*Mail::send(new Contact(), [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message')],
            function ($message) {
                $message->from('from@example.com');
                $message->to('from@example.com')
                    ->subject('Your Website Contact Form');
            });*/
        $name = $request->get('name');
        $email = $request->get('email');
        $messages = $request->get('message');
        //dd($messages);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Contact($name, $email, $messages));

        return redirectWithSuccess(url('marketer'), trans('admin.success_contact'));
    }
}
