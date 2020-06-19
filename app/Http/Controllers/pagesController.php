<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\PostRequest;

use App\Post;
use App\Category;
use DB;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Http\Requests\ContactRequest;


class pagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function posts()
    {
        $posts = Post::latest('id')->paginate(3);
        return view ('pages.posts', compact('posts'))->with('categories',Category::all());
    }

    public function post(Post $post)
    {
       // $post = DB::table('posts')->find($id);
        $stop_comment = DB::table('settings')->where('name', 'stop_comment')->value('value');
        return view ('pages.post', compact('post','stop_comment'));
    }

    public function store(Request $request)
    {
           // $data = $request->all();   //validation
            $this->validate(request(),[
                'title'       => 'required|min:5|max:50',
                'body'     => 'required|min:10|max:250',
                'featured'    => 'image|mimes:jpg,jpeg,gif,png|max:2048',
            ]);
            
            // image //
            $featured_new_name =time().'.'.$request->featured->getClientOriginalName();


            $post = new Post;
            $post->title = request('title');
            $post->body = request('body');      
            $post->featured = $featured_new_name;
            $post->category_id = request('category_id');
           
            $post->Save();


            //$post = Post::create([
            //'title'       => $request->title,
            //'body'        => $request->body,
            //'featured'    => 'uploads/posts'.$featured_new_name,
           // ]);
            $request->featured->move(public_path('uploads/posts'),$featured_new_name);

        return redirect()->route('Posts');
        // dd($request->all());
    
    }

    public function about()
    {
        
        return view ('pages.about');
    }

    public function contact()
     {
        return view('pages.contact');
     }
     public function send(ContactRequest $request)
     {
        $data = $request->all();
        Mail::to(config('mail.webmaster_email'))
        ->send(new Contact($data));
        return redirect()->back();
        //dd($request);
     }
   
    public function category($name)
    {
       $cat = DB::table('categories')->where('name',$name)->value('id');       // id
       $posts = DB::table('posts')->where('category_id',$cat)->get();       

        return view ('pages.category', compact('posts'));
  
    }
  
    public function admin()
    {
        $users = User::all();

        $stop_comment = DB::table('settings')->where('name', 'stop_comment')->value('value');
        $stop_register = DB::table('settings')->where('name', 'stop_register')->value('value');

        return view ('pages.admin',compact('users','stop_comment','stop_register'));
    }

    public function settings(Request $request)
    {
        if($request->stop_comment)
        {
            DB::table('settings')
            ->where('name', 'stop_comment')
            ->update(['value' => 1]);
        }
        else
        {
            DB::table('settings')
            ->where('name', 'stop_comment')
            ->update(['value' => 0]);
        }

        if($request->stop_register)
        {
            DB::table('settings')
            ->where('name', 'stop_register')
            ->update(['value' => 1]);
        }
        else
        {
            DB::table('settings')
            ->where('name', 'stop_register')
            ->update(['value' => 0]);
        }

        return redirect()->back();

    }

    public function addRole(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach();

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','User')->first());

        }

        if($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','Editor')->first());

        }

        if($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());

        }
        return redirect()->back();
    }

    public function editor()
    {
        return view ('pages.editor');
    }

    public function accessDenied()
    {
        return view ('pages.access_denied');
    }

    public function statistics()
    {
        $users = DB::table('users')->count();       
        $posts = DB::table('posts')->count();       
        $comments = DB::table('comments')->count();       

        return view ('pages.statistics', compact('users','posts','comments'));
    }



    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        //
        $post = Post::find($post);
        $post->delete();

        return redirect()->route('Posts');
    }
}
