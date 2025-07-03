<?php


namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class PostService{
    public function getLatestPosts($perPage = 5){
        return Post::orderBy('created_at', 'DESC')->paginate($perPage);
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
        Post::create($data);
    }

    public function getPostByCategory(Category $category): \Illuminate\Contracts\Pagination\Paginator
    {
        return $category->posts()->simplePaginate(5);
    }
}
