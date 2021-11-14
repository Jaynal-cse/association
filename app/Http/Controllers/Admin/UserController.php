<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user;
use App\Tag;
use Illuminate\Http\Request;
use Hash;

use App\Subscriber;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotify;


   
	
	
	
	
	
	use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::latest()->get();
        $tags = Tag::all();
		return view('admin.user.index')->with('posts',$posts)
		                               ->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$tags = Tag::all();
        return view('admin.user.create')->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate([
		'name' => 'required',
        'designation' =>'required',
		'address' => 'required',
        'email' => 'required|email|unique:users',
        'image' =>'required',
		'phone' =>'required',
        ]);
        //dd($request); 
		$image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }

            $postImage = Image::make($image)->resize(720,720)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
		
		
        $user = new User();
		$user->name = $request->name;
		$user->username=$request->username;
		$user->designation= $request->designation;
		$user->address = $request->address;
		$user->phone = $request->phone;
		$user ->email = $request->email;
		$user->role_id = $request->role_id;
		$user->password = Hash::make($request->password);
		$user->image = $imageName;
		
		$user->save();
        Toastr::success('User Successfully Added :)','Success');
        return Redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {    
        $tags =Tag::all();
        return view('admin.user.show')->with('user',$user)
                                      ->with('tags',$tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //$categories = Category::all();
        $tags = Tag::all();
        return view('admin.user.edit')->with('user',$user)
                                      ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
         request()->validate([
		'name' => 'required',
        'designation' =>'required',
		'address' => 'required',
        'email' => 'required|email',
		'phone'  => 'required'
      
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }
//            delete old post image
            if(Storage::disk('public')->exists('profile/'.$user->image))
            {
                Storage::disk('public')->delete('profile/'.$user->image);
            }
            $postImage = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$postImage);

        } else {
            $imageName = $user->image;
        }

        $user->name = $request->name;
		$user->username=$request->username;
		$user->designation= $request->designation;
		$user->address = $request->address;
		$user->phone = $request->phone;
		$user ->email = $request->email;
		$user->role_id = $request->role_id;
		$user->image = $imageName;
		
		$user->update();
        Toastr::success('User Successfully Updated:)','Success');
        return Redirect('/admin/user');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if (Storage::disk('public')->exists('profile/'.$user->image))
        {
            Storage::disk('public')->delete('profile/'.$user->image);
        }
        
        $user->delete();
        Toastr::success('User Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
