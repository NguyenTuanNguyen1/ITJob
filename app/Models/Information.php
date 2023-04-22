<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($id)
 * @method static orderBy(string $string, string $string1)
 */
class Information extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'information';
    protected $fillable = [
        'content',
        'ticket_reply',
        'user_id',
        'type_id',
    ];
}
