<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 */
class Level extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'level';
    protected $fillable = [
        'name'
    ];
}
