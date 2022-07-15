<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Profile;
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
            case 'ทั่วไป':
                $requestData['pet_category_id'] = null ;
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
        $user_id = Auth::id();
        $user = Auth::user();

        $post = Post::findOrFail($id);

        switch ($post->pet_category_id) {
            case 1:
                $post->pet_category_id = 'สุนัข';
                break;
            case 2:
                $post->pet_category_id = 'แมว' ;
                break;
            case 3:
                $post->pet_category_id = 'นก' ;
                break;
            case 4:
                $post->pet_category_id = 'ปลา' ;
                break;
            case 5:
                $post->pet_category_id = 'สัตว์เล็ก' ;
                break;
            case 6:
                $post->pet_category_id = 'Exotic' ;
                break;
            
            default:
                $post->pet_category_id = 'ทั่วไป' ;
                break;
        }

        // echo "<pre>";
        // print_r($post);
        // echo "<pre>";
        // exit();

        $select_category = Pet_Category::groupBy('name')->get();
        
        return view('post.edit', compact('post' , 'user_id' ,'user' ,'select_category'));
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
            case 'ทั่วไป':
                $requestData['pet_category_id'] = null ;
                break;
            
            default:
                $requestData['pet_category_id'] = null ;
                break;
        }

        $post->update($requestData);

        return redirect('/post'. '#id' . $id )->with('flash_message', 'Post updated!');
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

    public function edit_post($post_id)
    {
        $data_edit_post = Post::where('id' , $post_id)->get();

        return $data_edit_post ;
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
        $data_posts = Post::where('id' , $post_id)->first();

        if (!empty($data_posts->like_all)) {

            $like_all_arr = json_decode($data_posts->like_all) ;
            
            if (count($like_all_arr) === 1) {
                $like_arr = null ;
            }else{
                foreach (array_keys($like_all_arr, $user_id, true) as $key) {
                    unset($like_all_arr[$key]);
                }

                $like_arr = null ;
                foreach ($like_all_arr as $key) {
                    if (empty($like_arr)) {
                        $like_arr = array($key) ;
                    }else{
                        if (in_array($key , $like_arr)){
                            $like_arr = $like_arr ;
                        }
                        else{   
                            array_push($like_arr , $key) ;
                        }
                    }
                }
            }

            DB::table('posts')
                ->where('id', $post_id)
                ->update([
                    'like_all' => $like_arr,
            ]);
        }

        return "ok" ;
    }

    public function user_like_comment($comment_id,$user_id)
    {
        $data_comment = Comment::where('id' , $comment_id)->get();

        foreach ($data_comment as $item) {

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

        DB::table('comments')
            ->where('id', $comment_id)
            ->update([
                'like_all' => $like_all_arr,
        ]);

        return "ok" ;
    }

    public function un_user_like_comment($comment_id , $user_id)
    {
        $data_comment = Comment::where('id' , $comment_id)->first();

        if (!empty($data_comment->like_all)) {

            $like_all_arr = json_decode($data_comment->like_all) ;

            if (count($like_all_arr) === 1) {
                $like_arr = null ;
            }else{
                foreach (array_keys($like_all_arr, $user_id, true) as $key) {
                    unset($like_all_arr[$key]);
                }

                $like_arr = null ;
                foreach ($like_all_arr as $key) {
                    if (empty($like_arr)) {
                        $like_arr = array($key) ;
                    }else{
                        if (in_array($key , $like_arr)){
                            $like_arr = $like_arr ;
                        }
                        else{   
                            array_push($like_arr , $key) ;
                        }
                    }
                }
            }

            DB::table('comments')
                ->where('id', $comment_id)
                ->update([
                    'like_all' => $like_arr,
            ]);
        }

        return "ok" ;
    }

    public function login_line_post()
    {
        if(Auth::check()){
            return redirect('post');
        }else{
            return redirect('login/line?redirectTo=post');
        }
    }

    public function show_all_comment($post_id)
    {
        $data_comment = Comment::where('post_id' , $post_id)
                ->where('status' , "show")
                ->orderBy('id' , 'ASC')
                ->get();

        return $data_comment ;
    }

    public function show_data_profile($user_id)
    {
        $data_profile = Profile::where('user_id' , $user_id)->get();
        return $data_profile ;
    }

    public function submit_input_content_comment($user_id , $post_id , $content)
    {
        $data = [] ;
        $data['content'] = $content ;
        $data['user_id'] = $user_id ;
        $data['post_id'] = $post_id ;
        $data['status'] =  "show";

        Comment::create($data);

        return "ok" ;
    }

    public function delete_comment($comment_id)
    {
        DB::table('comments')
            ->where('id', $comment_id)
            ->update([
                'status' => "not_show",
        ]);

        return "ok" ;
    }

}
