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

			// dd(request()->all());
			// create a new post using the request data
			$post = new Post;
			$post->title = request('title');
			$post->body = request('body');
			
			// save it to the database
			$post->save();

			// and than redirect to the home page
			return redirect('/');
		}
}
