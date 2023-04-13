<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
 

class BlogController extends Controller
{
    
    /**
     * Display a listing of all blog posts
     */
    public function index()
    {
        return view('index', [  'blogs' => Blog::with('user')->latest()->paginate(5), ] );
        
    }

    /** 
     * Display a listing of blog posts of current user
     */
    public function adminview()
    {
        $blogs = auth()->user()->blogs();
        return view('dashboard', compact('blogs'));
        
    }

    /**
     * Show the form for creating a new post
     */
    public function add()
    {
    	return view('add');
    }

    /**
     * Helper for validation on create and update
     */
    protected function validationrules():array
    {  return [
        'title' => 'required|string|max:255',
        'post' => 'required'
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $this->validate($request, static::validationrules());
    	$task = new Blog();
    	$task->title = $request->title;
        $task->post = $request->post;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('blogadmin'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {  

    	if (auth()->user()->id == $blog->user_id)
        {            
                return view('edit', compact('blog'));
        }           
        else {
             return redirect('blogadmin');
         }            	
    }

     /**
     * Display the specified post
     */
    public function view(Blog $blog)
    {  
         return view('view', compact('blog'));
              	
    }

    /**
     * Update the specified post or remove it
     */
    public function update(Request $request, Blog $blog)
    {
    	if(isset($_POST['delete'])) {
    		$blog->delete();
    		return redirect('blogadmin');
    	}
    	else
    	{
            $this->validate($request, static::validationrules());
            $blog->title = $request->title;
            $blog->post = $request->post;
	    	$blog->save();
	    	return redirect('blogadmin'); 
    	}    	
    }
}
