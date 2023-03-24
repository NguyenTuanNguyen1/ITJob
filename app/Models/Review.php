<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 */
class Review extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'review';
    protected $fillable = [
        'content',
        'star',
        'user_id',
    ];
}
