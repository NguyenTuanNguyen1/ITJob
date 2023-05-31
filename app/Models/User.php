<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static where(string $string, $email)
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static whereNotNull(string $string)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'user';
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'address',
        'img_avatar',
        'position',
        'major',
        'description',
        'status',
        'start',
        'password',
        'provider',
        'remember_token',//Dùng để ghi nhớ đăng nhập
        'token',//Dùng để xác nhận lại mật khẩu
        'role_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

//    public function company()
//    {
//        return $this->hasOne(Company::class,'user_id');
//    }

//    public function mail($condition, $attributes)
//    {
//        return $this->hasMany(Mail::class,'user_id');
//    }
//     public function getPasswordAttribute(){
//         return $this->password;
//     }

    public function scopeSearch($query)
    {
        if (request('key'))
        {
            $key = request('key');
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
