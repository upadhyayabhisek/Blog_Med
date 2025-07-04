<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;

interface  PostRepositoryInterface
{
    public function getLatestPosts(int $perPage = 5);
    public function createPost(array $data):Post;

    public function searchByCategory(Category $category);

}
