<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find($id)
 * @method static where(string $string, $id)
 * @method static orderBy(string $string, string $string1)
 */
class Mail extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'email';
    protected $fillable = [
        'email',
        'sent_user_id',
        'content',
    ];
}
