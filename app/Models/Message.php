<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'txt', 
        'type',
        'isRead',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('h:m A d-M-y');
    }


    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public static function ofChat($chat_id)
    {
        return (new static)::where('chat_id', $chat_id)->get();
    }

    public static function unReadCount($chat_id)
    {
        return (new static)::where('chat_id', $chat_id)->where('isRead', false)->count();
    }

    public function read()
    {
        $this->isRead = true;
        $this->save();
    }
}
