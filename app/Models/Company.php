<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 */
class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company';
    protected $fillable = [
        'name',
        'username',
        'email',
        'type',
        'staff',
        'headquarters',
        'taxcode',
        'img_avatar',
        'address',
        'description',
        'password',
        'token',
        'role_id'
    ];
}
