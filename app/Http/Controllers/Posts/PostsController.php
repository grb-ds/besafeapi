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
}
