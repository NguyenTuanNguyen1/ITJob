<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Report extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'report';
    protected $fillable = [
        'content',
        'user_id',
    ];
}
