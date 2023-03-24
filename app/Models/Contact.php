<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Contact extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'contact';
    protected $fillable = [
        'name',
        'email',
        'content',
        'user_id'
    ];
}
