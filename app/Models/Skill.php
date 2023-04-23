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
class Skill extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'skill';
    protected $fillable = [
        'content'
    ];

    public function post()
    {
        return $this->hasOne(Post::class,'skill_id');
    }


}
