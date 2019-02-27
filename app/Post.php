<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 */
class Post extends Model
{
    //
use SoftDeletes;
    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
