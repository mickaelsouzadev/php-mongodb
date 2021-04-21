<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use App\Repositories\Interfaces\MongoRepositoryInterface;

interface PostRepositoryInterface extends MongoRepositoryInterface
{
    public function all() : Collection;
}
