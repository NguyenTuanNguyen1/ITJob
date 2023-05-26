<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static where(string $string, $to_user_id)
 */
class Review extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'review';
    protected $fillable = [
        'content',
        'image',
        'from_user_id',
        'to_user_id',
    ];

//    public function from_user_id()
//    {
//        return $this->belongsTo(User::class);
//    }
//
    public function from_user()
    {
        return $this->belongsTo(User::class);
    }
}
