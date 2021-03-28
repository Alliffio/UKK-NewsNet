<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posting;
use App\Category;

class BlogController extends Controller
{
    public function index(Posting $posting)
    {
        $category_widget = Category::all();

        $data = $posting->latest()->take(8)->get();
        return view ('blog', compact('data','category_widget'));
    }

    public function isi_post($slug)
    {
        $category_widget = Category::all();

        $data = Posting::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data','category_widget'));
    }

    public function list_blog(){
        $category_widget = Category::all();


    	$data = Posting::latest()->paginate(6);
    	return view('blog.list_post', compact('data','category_widget'));
    }

    public function list_category(Category $category){
        $category_widget = Category::all();

        $data = $category->posting()->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function about(){
        $category_widget = Category::all();
        return view('blog.about', compact('category_widget'));
    }
}
