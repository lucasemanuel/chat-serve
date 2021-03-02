<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'body',
        'destination_id',
    ];

    public function destination()
    {
        return $this->belongsTo(User::class);
    }
}
