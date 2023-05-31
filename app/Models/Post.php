<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static where(string $string, $array)
 * @method static join()
 * @method static search()
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
        'experience',
        'working',
        'major',
        'status',
        'image',
        'user_id',
        'approved_user_id',
        'approved_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approved_user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query)
    {
        if (request('key'))
        {
            $key = request('key');
            $query = $query->where('title', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
