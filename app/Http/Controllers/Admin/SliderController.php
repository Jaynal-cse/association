<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Tag;

use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Slider::latest()->get();
        return view('admin.slider.index')->with('posts',$posts);
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
        return view('admin.slider.create')->with('categories',$categories)
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
            'person' => 'required',
			'comment' => 'required',
            'image' => 'required',
            
            
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }

            $postImage = Image::make($image)->resize(1920,1080)->stream();
            Storage::disk('public')->put('slider/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Slider();
      
        $post->person = $request->person;
       
        $post->image = $imageName;
        $post->comment = $request->comment;
        $post->save();

        Toastr::success('Slider Successfully Saved :)','Success');
        return redirect()->route('admin.slider.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider  $slider)
    {  
       $categories = Category::all();
        $tags = Tag::all();
        return view('admin.slider.edit')->with('categories',$categories)
		                              ->with('tags',$tags)
									  ->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request,[
            'person' => 'required',
            
            
            'comment' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }
//            delete old post image
            if(Storage::disk('public')->exists('slider/'.$slider->image))
            {
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            $postImage = Image::make($image)->resize(1920,1080)->stream();
            Storage::disk('public')->put('slider/'.$imageName,$postImage);

        } else {
            $imageName = $slider->image;
        }

        //$post->user_id = Auth::id();
        $slider->person = $request->person;
       
        $slider->image = $imageName;
$slider->comment = $request->comment;
        
        
        $slider->save();

        

        Toastr::success('Slider Successfully Updated :)','Success');
        return redirect()->route('admin.slider.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (Storage::disk('public')->exists('slider/'.$slider->image))
        {
            Storage::disk('public')->delete('slider/'.$slider->image);
        }
        
        $slider->delete();
        Toastr::success('Slider Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
