<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Auth;
use DB;
use App\Post;
use App\Comment;
use App\User;
use App\Profile;
use App\Followers;

class UsersController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $data = [];
      $data['photos'] = Post::orderBy('created_at', 'desc')->get();
      $data['listUsers'] = User::all();

      return view('Users.beranda', $data);
    }
    public function upload()
    {
      return view('Users.upload');
    }
    public function post($id)
    {
      $data['post'] = Post::where('_id', $id)->get();
      $data['user'] = User::all();
      $data['comment'] = Comment::where('idpost', $id)->orderBy('created_at', 'desc')->get();
      
      return view('Users.item', $data);

    }
    public function commentAction(Request $r){

     $comment = new Comment;
     $comment->idpost = $r->idPost;
     $comment->comment = $r->commentPost;
     $comment->iduser = Auth::user()->id;
     $comment->save();

     return redirect()->route('post', [$r->idPost]);

   }
   public function mygallery()
   {
    $galeri = [];
    $galeri['posts'] = Post::where('by', '=', Auth::user()->email)->get();
    $galeri['followers'] = Followers::where('following', '=', Auth::user()->email)->count();
    $galeri['following'] = Followers::where('nama', '=', Auth::user()->email)->count();
    $galeri['profile'] = Profile::where('iduser', '=', Auth::user()->id)->get();
    return view('Users.gallery', $galeri);

  }
  public function userGallery(Request $request, $by)
  {
    $nama = User::where('email', '=', $by)->get();
    foreach ($nama as $identitas)
      $post['akun'] = User::where('email', '=', $by)->get();
    $post['photo'] = Post::where('by', '=', $by)->get();
    $post['profile'] = Profile::where('iduser', '=', $identitas->_id)->get();
    $post['followers'] = Followers::where('following', '=', $identitas->email)->count();
    $post['following'] = Followers::where('nama', '=', $identitas->email)->count();
    return view('Users.usergallery', $post);
  }
  public function edit($id)
  {
    $post['photo'] = Post::where('_id', '=', $id)->get();
        // dd($post['photo']);
    return view('Users.edit', $post);
  }
  public function editAction(Request $r){
    DB::table('posts')->where('_id', $r->input('idpost'))->update(
      ['caption' => $r->input('captionPost'),
      'description' => $r->input('descriptionPost'),
      'work_location' => $r->input('work_location')
      ]
      );
    return redirect()->route('mygallery');

  }
  public function uploadAction(Request $r){
    $file = $r->file('picturePost');

    $gambar = $file->getClientOriginalName();
    $r->file('picturePost')->move(public_path('upload'), $gambar);        

    $post = new Post;
    $post->caption = $r->captionPost;
    $post->description = $r->descriptionPost;
    $post->file = $gambar;
    $post->by = Auth::user()->email;
    $post->save();

    return redirect()->route('mygallery');

  }
  public function deletePost(Request $r){
    $delete = Post::where('_id', $r->idpost)->delete();
    $galeri['posts'] = Post::where('by', '=', Auth::user()->email)->get();
    return redirect()->route('mygallery', $galeri);
  }
  public function editProfile(){
    return view('Users.editprofile');
  }
  public function editProfileAction(Request $r){
    if(isset($r->photo)){
      $file = $r->file('photo');
      $gambar = $file->getClientOriginalName();
      $r->file('photo')->move(public_path('profiles'), $gambar);

      DB::table('profiles')->where('iduser', $r->input('iduser'))->update(
        ['bio' => $r->input('bio'),
        'photo' => $gambar
        ]
        );
    }else{
      DB::table('profiles')->where('iduser', $r->input('iduser'))->update(
        ['bio' => $r->input('bio')
        ]
        );
    }

    return redirect()->route('mygallery');
  }
  public function followAction(Request $r){
    $follow = new Followers;
    $follow->nama = Auth::user()->email;
    $follow->following = $r->following;
    $follow->save();

    return redirect()->route('index');
  }
  public function unfollowAction(Request $r){
    $delete = Followers::where('nama', Auth::user()->email)->where('following', $r->following)->delete();

    return redirect()->route('index');
  }
}
