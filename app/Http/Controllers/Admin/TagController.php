<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
 use Brian2694\Toastr\Facades\Toastr;
use App\Tag;
use App\Subtag;
use App\Personel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
		
		$tags = Tag::latest()->get();
		$subtags = Subtag::all();
        return view('admin.tag.index')->with('tags',$tags)
		                                   ->with('subtags',$subtags);
    }
	
	public function indexallsubtag($tag_id)
    {
        $subtags = Subtag::where('tag_id',$tag_id)->orderBy('tag_id','asc')->get();
		$tags  = Tag::all();
		$personels = Personel::all();
        return view('admin.tag.subtag.index')->with('subtags',$subtags)
		                                     ->with('tags',$tags)
										     ->with('personels',$personels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'name' => 'required|unique:tags',
            'body' => 'required',
			
        ]);
		
        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists

            if (!Storage::disk('public')->exists('tag'))
            {   
                Storage::disk('public')->makeDirectory('tag');
            }
//            resize image for category and upload

            $category = Image::make($image)->resize(1600,479)->stream();
			//dd('fgerter');
            Storage::disk('public')->put('tag/'.$imagename,$category);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('tag/slider'))
            {
                Storage::disk('public')->makeDirectory('tag/slider');
            }
            //            resize image for category slider and upload
			
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('tag/slider/'.$imagename,$slider);

        } else {
            $imagename = "default.png";
        }

        $tag = new Tag();
        $tag->name = $request->name;
         $tag->slug = $slug;
		 $tag->detail = $request->body;
		 $tag->priority = $request->priority;
		// $tag->status = $request->status;
        $tag->image = $imagename;
		//dd('dgd');
         $tag->save();
        Toastr::success('Office Successfully Saved :)' ,'Success');
        return redirect()->route('admin.tag.index');

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
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit')->with('tag',$tag);
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
		
		        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $tag = Tag::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('tag'))
            {
                Storage::disk('public')->makeDirectory('tag');
            }
//            delete old image
            if (Storage::disk('public')->exists('tag/'.$tag->image))
            {
                Storage::disk('public')->delete('tag/'.$tag->image);
            }
//            resize image for category and upload
            $categoryimage = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('tag/'.$imagename,$categoryimage);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('tag/slider'))
            {
                Storage::disk('public')->makeDirectory('tag/slider');
            }
            //            delete old slider image
            if (Storage::disk('public')->exists('tag/slider/'.$tag->image))
            {
                Storage::disk('public')->delete('tag/slider/'.$tag->image);
            }
            //            resize image for category slider and upload
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('tag/slider/'.$imagename,$slider);

        } else {
            $imagename = $tag->image;
        }

        $tag->name = $request->name;
        $tag->slug = $slug;
		$tag->detail = $request->body;
		$tag->priority = $request->priority;
		//$tag->status = $request->status;
        $tag->image = $imagename;
        $tag->save();
        Toastr::success('Office Successfully Updated :)' ,'Success');
        return redirect()->route('admin.tag.index');
		
		
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   /*
        Tag::find($id)->delete();
        Toastr::success('Designation Successfully Deleted :)','Success');
        return redirect()->back();
		
		*/
		
		$tag = Tag::find($id);
        if (Storage::disk('public')->exists('tag/'.$tag->image))
        {
           Storage::disk('public')->delete('tag/'.$tag->image);
        }

        if (Storage::disk('public')->exists('tag/slider/'.$tag->image))
        {
            Storage::disk('public')->delete('tag/slider/'.$tag->image);
        }
		
		
		
		//Delete all info(as like post) for this category.To do this,truncted related table from database
		
        $tag->delete();
		
		
        Toastr::success('Office Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
