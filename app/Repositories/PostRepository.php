<?php

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    private $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function all() : Collection
    {
        return $this->model->all();
    }

    public function find($id) : ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function findByTitleName($title_name) : Collection
    {
        return $this->model->where('title', 'LIKE', "%{$title_name}%");
    }

    public function create(array $attributes) : Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id) : ?Model
    {
        $post = $this->model->findOrFail($id);

        if ($post->update($attributes)) {
            return $post;
        }

        return null;
    }

    public function delete($id) : ?Bool
    {
        return $this->model->find($id)->delete();
    }
}
