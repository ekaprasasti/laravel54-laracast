<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
		public function index(){
			$posts = Post::latest()->get();
						
			return view('posts.index', compact('posts'));	
		}

		public function show(Post $post){
			return view('posts.show', compact('post'));
		}

		public function create(){
			return view('posts.create'); 
		}
		
		public function store(){
			// validate data
			$this->validate(request(),[
				'title' => 'required',
				'body' => 'required'
			]);

			$post = new Post;

			Post::create(request(['title', 'body']));			

			// and than redirect to the home page
			return redirect('/');
		}
}
