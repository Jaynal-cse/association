<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\Subscriber;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotify;


   
	
	
	
	
	
	use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Service::latest()->take(6)->get();
        return view('admin.service.index')->with('posts',$posts);
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
        return view('admin.service.create')->with('categories',$categories)
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
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('service'))
            {
                Storage::disk('public')->makeDirectory('service');
            }

            $postImage = Image::make($image)->resize(480,380)->stream();
            Storage::disk('public')->put('service/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Service();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->content;        
        $post->save();
		
		
		


 

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
		$subscribers = Subscriber::all();
        

        Toastr::success('Service Successfully Saved :)','Success');
        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.service.edit')->with('categories',$categories)
		                              ->with('tags',$tags)
									  ->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('service'))
            {
                Storage::disk('public')->makeDirectory('service');
            }
//            delete old post image
            if(Storage::disk('public')->exists('service/'.$service->image))
            {
                Storage::disk('public')->delete('service/'.$service->image);
            }
            $postImage = Image::make($image)->resize(480,380)->stream();
            Storage::disk('public')->put('service/'.$imageName,$postImage);

        } else {
            $imageName = $service->image;
        }

        //$post->user_id = Auth::id();
        $service->title = $request->title;
        $service->slug = $slug;
        $service->image = $imageName;
        $service->body = $request->content;
        
        
        $service->save();

        $service->categories()->sync($request->categories);
        $service->tags()->sync($request->tags);

        Toastr::success('Service Successfully Updated :)','Success');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (Storage::disk('public')->exists('service/'.$service->image))
        {
            Storage::disk('public')->delete('service/'.$service->image);
        }
        $service->categories()->detach();
        $service->tags()->detach();
        $service->delete();
        Toastr::success('Service Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
