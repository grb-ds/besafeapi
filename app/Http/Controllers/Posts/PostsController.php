<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostsModel;


class PostsController extends Controller
{
    public function posts(){
        return response()->json(PostsModel::get(), 200);
    }
	
	public function postsById($id){
        return response()->json(PostsModel::find($id), 200);
    }

    public function postsSave(Request $request){
        $posts = PostsModel::create($request->all());
        return response()->json($posts, 201);
    }

}
