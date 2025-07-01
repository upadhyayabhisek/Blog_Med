<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class LikeController extends Controller
{
    public function like(Post $post){
        $hasLiked = auth()->user()->hasLiked($post);
        if($hasLiked){
            $post->likes()->where('user_id', auth()->id())->delete();
        }else{
            $post->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }


        return response()->json([
            'likesCount'=>$post->likes()->count(),
        ]);
    }
}
