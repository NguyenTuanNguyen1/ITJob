<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static where(string $string, $id)
 */
class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'company_information';
    protected $fillable = [
        'type',
        'staff',
        'headquarters',
        'taxcode',
        'description',
        'token',
        'website',
        'business_license',
        'user_id'
    ];
}
