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
class Post extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'post';
    protected $fillable = [
        'title',
        'requirements',
        'description',
        'benefit',
        'quantity',
        'position',
        'workplace',
        'level',
        'major',
        'status',
        'approved_user_id',
        'skill_id',
        'user_id',
    ];

//    public function user()
//    {
//        return $this->hasOne(User::class,'user_id');
//    }
}
