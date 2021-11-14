<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\personel;
use Illuminate\Http\Request;
use App\post;
use App\Category;
use App\Tag;
use App\Subtag;
use App\Subscriber;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotify;


   
	
	
	
	
	
	use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;


class PersonelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $posts = Personel::latest()->get();
        $subtags = Subtag::all();
        return view('admin.personel.index')->with('posts',$posts)
                                           ->with('subtags',$subtags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.personel.create')->with('categories',$categories)
		                                ->with('tags',$tags);
										
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'subtag_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'required',
			'priority' => 'required|unique:personels'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('personel'))
            {
                Storage::disk('public')->makeDirectory('personel');
            }

            $postImage = Image::make($image)->resize(720,720)->stream();
            Storage::disk('public')->put('personel/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Personel();
        
        $post->name = $request->name;
        $post->slug = $request->priority;
		$post->message = $request->message;
		$post->phone = $request->phone;
		$post->email = $request->email;
		$post->subtag_id = $request->subtag_id;
        $post->image = $imageName;
        $post->facebook_link = $request->facebook_link;
		$post->priority = $request->priority; 
        //$post->office = $request->category;
        $post->joining_date = "1.1.21";		
        $post->save();
        Toastr::success('Post Successfully Saved :)','Success');
        return redirect()->route('admin.personel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function show(personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function edit(personel $personel)
    {
        //$categories = Category::all();
        $tags = Tag::all();
		$tag_id_of_selected_tag = Subtag::select('tag_id')->where('id',$personel->subtag_id)->first();
        //$allSubtagsOfSlectedTag = Subtag::where('tag_id',$tag_id_of_selected_tag->tag_id)->get();		
        return view('admin.personel.edit')->with('personel',$personel)
		                                  ->with('tags',$tags)
										  ->with('tag_id_of_selected_tag',$tag_id_of_selected_tag);
										  
										 
									  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personel $personel)
    {
                
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('personel'))
            {
                Storage::disk('public')->makeDirectory('personel');
            }
//            delete old post image
            if(Storage::disk('public')->exists('personel/'.$personel->image))
            {
                Storage::disk('public')->delete('personel/'.$personel->image);
            }
            $postImage = Image::make($image)->resize(720,720)->stream();
            Storage::disk('public')->put('personel/'.$imageName,$postImage);

        } else {
            $imageName = $personel->image;
        }

        //$post->user_id = Auth::id();
        $personel->name = $request->name;
        $personel->slug = $request->priority;
		$personel->message = $request->message;
		$personel->phone = $request->phone;
		$personel->email = $request->email; 
		$personel->subtag_id = $request->subtag_id;
		//$personel->office = $request->category;
        $personel->image = $imageName;
		$personel->facebook_link = $request->facebook_link;
		$personel->priority = $request->priority;
       
        $personel->save();

        

        Toastr::success('Personnel Successfully Updated :)','Success');
        return redirect()->route('admin.personel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy(personel $personel)
    {
       if (Storage::disk('public')->exists('personel/'.$personel->image))
        {
            Storage::disk('public')->delete('personel/'.$personel->image);
        }
       
        $personel->delete();
        Toastr::success('Personnel Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
