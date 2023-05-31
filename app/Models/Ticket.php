<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, $action)
 * @method static find($id)
 */

//Contact and TicketType
class Ticket extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'ticket';
    protected $fillable = [
        'username',
        'subject',
        'email',
        'content',
        'image',
        'status',
        'user_id',
        'reply_user_id',
        'type_id',
        'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameTicket()
    {
        return $this->user->username;
    }
}
