<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Requirements extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'requirements_information';
    protected $fillable = [
        'content',
        'post_id',
    ];
}
