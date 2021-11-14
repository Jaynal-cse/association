<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
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
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Gallery::latest()->get();
        return view('admin.gallery.index')->with('posts',$posts);
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
        return view('admin.gallery.create')->with('categories',$categories)
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
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
			
			]);
        $notice = new Gallery();
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image))
        {
//           
            $currentDate = Carbon::now()->toDateString();
            $imageName  =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('galley'))
            {
                Storage::disk('public')->makeDirectory('gallery');
            }
            $filePath = $image->storeAs('gallery', $imageName, 'public');
            

        } else {
            $imageName = "abc.pdf";
        }
      
     
        $notice->name = $request->name;
        $notice->image = $imageName;
       		
        $notice->save();

        Toastr::success('Picutre Successfully Saved :)','Success');
        return redirect()->route('admin.gallery.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if (Storage::disk('public')->exists('galley/'.$gallery->image))
        {
            Storage::disk('public')->delete('gallery/'.$gallery->image);
        }
        
        $gallery->delete();
        Toastr::success('Image Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
