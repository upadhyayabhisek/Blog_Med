<?php


namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Support\Str;

class PostService{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function getLatestPosts($perPage = 5){
        return $this->postRepository->getLatestPosts($perPage);
    }

    public function getCategories(){
        return Category::get();
    }

    public function storePost(array $data):void{
        $image = $data['image'];
        unset($data['image']);
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        $imagePath = $image->store('posts', 'public');
        $data['image'] = $imagePath;

        $this->postRepository->createPost($data);
    }

    public function getPostByCategory(Category $category): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->postRepository->searchByCategory($category);
    }
}
