<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        try {
            return response()->success($this->postRepository->all());
        } catch (\Exception $e) {
            return response()->error("Não foi possível carregar os posts");
        }

    }

    public function store(Request $request)
    {
        try {
            $post = $this->postRepository->create($request->all());

            if ($post) {
                return response()->success($post, 201);
            }

            return response()->error("Não foi possível adicionar este post");
        } catch (\Exception $e) {
            return response()->error("Ocorreu um erro interno no servidor", 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->postRepository->find($id);
        } catch (ModelNotFoundException $e) {
            return response()->error("Post não encontrado", 404);
        } catch (\Exception $e) {
            return response()->error("Ocorreu um erro interno no servidor", 500);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $post = $this->postRepository->update($request->all(), $id);

            if ($post) {
                return response()->success($post);
            }

            return response()->error("Não foi possível atualizar este post");
        } catch (\Exception $e) {
            return response()->error("Ocorreu um erro interno no servidor", 500);
        }
    }

    public function destroy($id)
    {
        try {
            if($this->postRepository->delete($id)) {
                return response()->success(true);
            }

            return response()->error("Não foi possível remover este post");
        }catch(\Exception $e) {
            return response()->error("Ocorreu um erro interno no servidor", 500);
        }
    }
}

