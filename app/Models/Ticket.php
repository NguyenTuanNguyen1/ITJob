<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 */

//Contact and TicketType
class Ticket extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'ticket';
    protected $fillable = [
        'content',
        'image',
        'ticket_id',
        'user_id'
    ];
}
