<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Experience extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'experience_information';
    protected $fillable = [
        'content',
        'user_id',
    ];
}
