<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';
    protected $fillable = [
        'image',
        'message',
        'from_user_id',
        'to_user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
