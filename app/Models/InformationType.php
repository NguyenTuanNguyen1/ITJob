<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find(string $string)
 * @method static where(string $string, false|resource|string|null $content)
 */
class InformationType extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'information_type';
    protected $fillable = [
        'content',
    ];
}