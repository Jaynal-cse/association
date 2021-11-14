<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

use App\notice;
use App\Category;
use App\Subcategory;
use App\Tag;

use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Video::latest()->get();
        return view('admin.video.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //$categories = Category::all();
		//Id of notice category is 36
		$categories = Subcategory::where('category_id',36)->get();
        $tags = Tag::all();
        return view('admin.video.create')->with('categories',$categories)
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
                
        $request->validate([
             'name' =>'required',
            'link' => 'required',
			
			]);
        $notice = new Video();
       
      
     
        $notice->name = $request->name;
		$notice->ref = $request->link;
    
       		
        $notice->save();

        Toastr::success('Video Successfully Saved :)','Success');
        return redirect()->route('admin.video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
       
        
        $video->delete();
        Toastr::success('Video Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
