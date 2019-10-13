<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function homepage()
    {
        $categories = Category::all();
        return view('pages.homepage', get_defined_vars());
    }

    public function post($post_id)
    {
        $post = Post::get('id', $post_id);
        $comments = Comment::where('post_id', $post_id)->get();
        return view('pages.article', get_defined_vars());
    }

    public function category($category_id)
    {
        $category = Category::get('id', $category_id);
        $posts = Post::where('category_id', $category_id)->get();
        return view('pages.categories', get_defined_vars());
    }

}
