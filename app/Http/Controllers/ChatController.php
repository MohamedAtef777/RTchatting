<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //show the chat interface for a specific user
    public function show (User $user)
    {
        return view ('chat',[
            'user'=>$user,
        ]);
    }
//Get all the messages between the authenticated user and the specified user
    public function index(User $user)
    {
    return Message::query()
        ->where(function ($query)use ($user){
            //nafs ma3na auth()->id()
            $query->where('sender_id',Auth::id())
                    ->where('receiver_id',$user->id);
        })
        ->orWhere(function ($query) use ($user){
            $query->where('sender_id',$user->id)
                ->where('receiver_id',Auth::id());
        })
        ->with(['sender','receiver'])
        ->orderBy('created_at','asc')
        ->get();

    }
    //send a message to the specified user
    public function sendMessage (Request $request,User $user){
        $request->validate([
           'message'=>'required|string|max:1000'
        ]);
        $message = Message::create([
            'sender_id'=>Auth::id(),
            'receiver_id'=>$user->id,
            'text'=>$request->input('message'),
        ]);
        //Brodecast the message for real -time update
        broadcast(new MessageSent($message))->toOthers();
        return response()->json($message);
    }
}
