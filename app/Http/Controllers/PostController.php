<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    protected PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
//      $posts = Post::orderBy('created_at','DESC')->paginate(5);
        $posts = $this->postService->getLatestPosts();
        return view('post.index', compact( 'posts'));
    }

    public function create()
    {
        $categories = $this->postService->getCategories();
        return view('post.create',['categories'=>$categories]);
    }

    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        $this->postService->storePost($data);
        return redirect()->route('dashboard');
    }

    public function show(string $username,Post $post)
    {
        return view('post.show',
            ['post'=>$post,]
        );
    }

    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }

    public function category(Category $category)
    {
        //$posts = $category->posts()->simplePaginate(5);
        $posts = $this->postService->getPostByCategory($category);
        return view('post.index',[
            'posts'=>$posts,
        ]);
    }
}
