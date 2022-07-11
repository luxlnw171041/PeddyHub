<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Pet_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

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
        $id = Auth::id();
        $user = Auth::user();

        $category  = $request->get('pet_category_id');
        $comment = Comment::all(['id', 'post_id' ,'user_id' ,'content' ,'created_at']);
        
        $needFilter =  !empty($category);

        if (!empty($needFilter)) {
            $post = Post::where('pet_category_id',    'LIKE', '%' .$category.'%')
                ->latest()->paginate($perPage);
        } else {
            $post = Post::latest()->paginate($perPage);
        }

        $select_category = Pet_Category::groupBy('name')->get();

        return view('post.index', compact('post' ,'id' ,'comment' ,'user','select_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = Pet_Category::groupBy('name')->get();
       

        $user = Auth::user();
        return view('post.create' , compact('category'));
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

        switch ($requestData['pet_category_id']) {
            case 'สุนัข':
                $requestData['pet_category_id'] = 1 ;
                break;
            case 'แมว':
                $requestData['pet_category_id'] = 2 ;
                break;
            case 'นก':
                $requestData['pet_category_id'] = 3 ;
                break;
            case 'ปลา':
                $requestData['pet_category_id'] = 4 ;
                break;
            case 'สัตว์เล็ก':
                $requestData['pet_category_id'] = 5 ;
                break;
            case 'Exotic':
                $requestData['pet_category_id'] = 6 ;
                break;
            
            default:
                $requestData['pet_category_id'] = null ;
                break;
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
        $comment = Comment::all(['id', 'post_id' ,'user_id' ,'content' ,'created_at']);
        $user_id = Auth::id();
        
        $posts = Post::where('id' , '=' ,$id)->get();
        $likePost = Post::find($id);
        $likeCtr = Like::where(['post_id' => $likePost->id] )->count();

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

        return view('post.show', compact('post' , 'query' ,'comment' , 'user_id' ,'likeCtr' ));
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
        $category = Pet_Category::groupBy('name')->get();
        $post = Post::findOrFail($id);
        
        return view('post.edit', compact('post' ,'category'));
       
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

    public function user_like_post($user_id , $post_id)
    {
        $data_posts = Post::where('id' , $post_id)->get();

        foreach ($data_posts as $item) {

            if (empty($item->like_all)) {
                $like_all_arr = array($user_id) ;
            }else{
                $like_all_arr = json_decode($item->like_all) ;
                if (in_array($user_id , $like_all_arr)){
                    $like_all_arr = $like_all_arr ;
                }
                else{   
                    array_push($like_all_arr , $user_id) ;
                }
            }

        }

        DB::table('posts')
            ->where('id', $post_id)
            ->update([
                'like_all' => $like_all_arr,
        ]);

        return "ok" ;
    }

    public function un_user_like_post($user_id , $post_id)
    {
        $data_posts = Post::where('id' , $post_id)->get();

        foreach ($data_posts as $item) {

            $like_all_arr = json_decode($item->like_all) ;
            
            // if (in_array($user_id , $like_all_arr)){
            //     $like_all_arr = $like_all_arr ;
            // }
            // else{   
            //     array_push($like_all_arr , $user_id) ;
            // }

        }

        DB::table('posts')
            ->where('id', $post_id)
            ->update([
                'like_all' => $like_all_arr,
        ]);

        return "ok" ;
    }
}
