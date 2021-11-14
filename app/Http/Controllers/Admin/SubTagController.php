<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subtag;
use App\Tag;
use Carbon\carbon;
use DB;
use App\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class SubTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtags = Subtag::orderBy('tag_id','asc')->get();
		$tags  = Tag::all();
		$personels = Personel::all();
		//dd($personels);
        return view('admin.tag.subtag.index')->with('subtags',$subtags)
		                                               ->with('tags',$tags)
													   ->with('personels',$personels);
    }
	
	public function indexSubtag($subtag_id)
    {
        $posts = Personel::where('subtag_id',$subtag_id)->get();
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
       
	    $tags = Tag::all();
        return view('admin.tag.subtag.create')->with('tags',$tags);
    
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
            'name' => 'required|unique:subtags',
            'body' => 'required',
			'tag_id'  => 'required'
			
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

        $subtag = new Subtag();
        $subtag->name = $request->name;
       $subtag->slug = $slug;
		$subtag->description = $request->body;
		$subtag->tag_id = $request->tag_id;
		$subtag->priority = $request->priority;
		//$subtag->status = $request->status;
        $subtag->image = $imagename;
		//dd('dgd');
        $subtag->save();
        Toastr::success('Designation Successfully Saved :)' ,'Success');
        return redirect()->route('admin.sub-tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subtag  $subtag
     * @return \Illuminate\Http\Response
     */
    public function show(Subtag $subtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subtag  $subtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtag $subtag,$id)
    {
        $subtag = Subtag::find($id);
		$tag = Tag::where('id',$subtag->tag_id);
		$alltags = Tag::all();
        return view('admin.tag.subtag.edit')->with('tag',$tag )
		                                              ->with('subtag',$subtag)
													  ->with('alltags',$alltags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subtag  $subtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subtag $subtag,$id)
    {
         $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $subtag = Subtag::find($id);
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
            if (Storage::disk('public')->exists('tag/'.$subtag->image))
            {
                Storage::disk('public')->delete('tag/'.$subtag->image);
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
            if (Storage::disk('public')->exists('tag/slider/'.$subtag->image))
            {
                Storage::disk('public')->delete('tag/slider/'.$subtag->image);
            }
            //            resize image for category slider and upload
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('tag/slider/'.$imagename,$slider);

        } else {
            $imagename = $subtag->image;
        }

       $subtag->name = $request->name;
        $subtag->slug = $slug;
		$subtag->description = $request->body;
		$subtag->priority = $request->priority;
		$subtag->tag_id = $request->tag_id;
		//$tag->status = $request->status;
        $subtag->image = $imagename;
        $subtag->save();
        Toastr::success('Designation Successfully Updated :)' ,'Success');
        return redirect()->route('admin.sub-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subtag  $subtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtag $subtag)
    {
        //
    }
	
	//->groupBy($dependent)
	public function fetch(Request $request){
		
		//http://myproject.com/admin/personel/subtag?value=18
		
		 $subtags =Subtag::where('tag_id', $request->tag_id)->get();
		 $SelectedSubtagId =Personel::select('subtag_id')->where('id',$request->personel_id)->first();
	   return json_encode( $subtags);
	   
	}
	  
}
