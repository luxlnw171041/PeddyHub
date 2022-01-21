<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $post = Post::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $post = Post::latest()->paginate($perPage);
        }

        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }
        $requestData['user_id'] = Auth::id();   
        Post::create($requestData);

        return redirect('post')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $perPage = 25;
        
        if (!empty($keyword)) {
            $post = Post::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $post = Post::latest()->paginate($perPage);
        }

        $post = Post::findOrFail($id);
        $query = Post::all(['id', 'detail' ,'photo' ,'created_at']);

        return view('post.show', compact('post' , 'query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $post = Post::findOrFail($id);
        $post->update($requestData);

        return redirect('post')->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('post')->with('flash_message', 'Post deleted!');
    }
    public function test()
    {
        

        return view('post.show',compact('query'));
    }
}
