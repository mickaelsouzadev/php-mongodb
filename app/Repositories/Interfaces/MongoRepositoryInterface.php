<?php

namespace App\Repositories\Interfaces;

use Jenssegers\Mongodb\Eloquent\Model;

interface MongoRepositoryInterface
{
    public function create(array $attributes) : Model;

    public function update(array $attributes, $id) : ?Model;

    public function delete($id) : ?Bool;

    public function find($id) : ?Model;
}
