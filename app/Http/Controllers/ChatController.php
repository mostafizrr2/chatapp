<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    function get_contacts()
    {
       $contact = User::where('id', '!=', auth()->user()->id)->get();

       return response()->json($contact);
    }

    function get_conversation($id)
    {
          $messages = Message::where('from', $id)->orWhere('to', $id)->get();
          return response()->json($messages);
    }

    function send_message(Request $rq)
    {
        $message = Message::create([
                    'from' => auth()->user()->id,
                    'to' => $rq->contact_id,
                    'text' => $rq->text
                ]);

        broadcast(new NewMessage($message));
 
        return response()->json($message);
    }
}
