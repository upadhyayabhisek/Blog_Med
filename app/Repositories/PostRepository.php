<?php
namespace App\Repositories;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;


class PostRepository implements PostRepositoryInterface
{
    public function getLatestPosts(int $perPage = 5){
        return Post::orderBy('created_at', 'DESC')->paginate($perPage);
    }
    public function createPost(array $data):Post{
        return Post::create($data);
    }
    public function searchByCategory(Category $category){
        return $category->posts()->simplePaginate(5);
    }
}
