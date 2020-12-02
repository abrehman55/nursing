<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\Api;
use App\Helpers\SendNotification;
use App\Helpers\Type;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $messages = Message::ofChat($request->id);
        
        foreach($messages as $message){
            $message->read();
        }
        return Api::setResponse('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $senderChat = Chat::updateOrCreate([
            'owner_id' => Auth::user()->id,
            'opponent_id' => $request->receiver_id
        ]);
        
        $receiverChat = Chat::updateOrCreate([
            'opponent_id' => Auth::user()->id,
            'owner_id' => $request->receiver_id
        ]);

        $message = Message::create([
            'chat_id' => $senderChat->id,
            'type' => Type::sent(),
            'isRead' => true,
            'txt' => $request->txt
        ]);
        
        Message::create([
            'chat_id' => $receiverChat->id,
            'type' => Type::received(),
            'txt' => $request->txt
        ]);
        
        try{
            $receiver = User::find($request->receiver_id);

            SendNotification::sendPushNotification($receiver->firebase_token,$request);

        }catch(Exception $e){
            // dd($e);
        }
       
        return Api::setResponse('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

}
