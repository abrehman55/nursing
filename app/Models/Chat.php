<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'owner_id',
        'opponent_id',
    ];

    public function opponent(){
        return $this->belongsTo(User::class, 'opponent_id');
    }
    
    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function of($owner_id){
        $chats = (new static)::where('owner_id', $owner_id)->with('opponent')->get();
        foreach($chats as $chat){
            $chat->unread = Message::unReadCount($chat->id);
        }
        return $chats;
    }

    public static function unreadCount($owner_id){
        $count = 0;
        $chats = (new static)::where('owner_id', $owner_id)->with('opponent')->get();
        foreach($chats as $chat){
            $count += Message::unReadCount($chat->id);
        }
        return $count;
    }

    public static function ofSender($sender_id, $receiver_id){
        return (new static)::where('owner_id', $sender_id)->where('opponent_id', $receiver_id)->first();
    }
    
    public static function ofReceiver($sender_id, $receiver_id){
        return (new static)::where('owner_id', $receiver_id)->where('opponent_id', $sender_id)->first();
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
