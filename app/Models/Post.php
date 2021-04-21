<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'article'];
}
