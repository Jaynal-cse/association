<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subcategory;
use App\Category;
use App\Notice;

use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('category_id','asc')->get();
		$categories  = Category::all();
		$notices = Notice::all();
        return view('admin.category.subcategory.index')->with('subcategories',$subcategories)
		                                               ->with('categories',$categories)
													   ->with('notices',$notices);
    }
	public function indexSubcategory($subcategory_id)
    {
        $posts = Notice::where('subcategory_id',$subcategory_id)->get();
        return view('admin.notice.index')->with('posts',$posts);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
	    $categories = Category::all();
        return view('admin.category.subcategory.create')->with('categories',$categories);
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
            'name' => 'required|unique:categories',
            'body' => 'required',
			'category_id'  => 'required'
			
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

            if (!Storage::disk('public')->exists('category'))
            {   
                Storage::disk('public')->makeDirectory('category');
            }
//            resize image for category and upload

            $category = Image::make($image)->resize(1600,479)->stream();
			//dd('fgerter');
            Storage::disk('public')->put('category/'.$imagename,$category);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('category/slider'))
            {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            //            resize image for category slider and upload
			
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('category/slider/'.$imagename,$slider);

        } else {
            $imagename = "default.png";
        }

        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->slug = $slug;
		$subcategory->description = $request->body;
		$subcategory->category_id = $request->category_id;
		$subcategory->priority = $request->priority;
		//$subcategory->status = $request->status;
        $subcategory->image = $imagename;
		//dd('dgd');
        $subcategory->save();
        Toastr::success('Sub-Category Successfully Saved :)' ,'Success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory,$id)
    {   //dd($subcategory);
        $subcategory = Subcategory::find($id);
		$category = Category::where('id',$subcategory->category_id);
		$allcategories = Category::all();
        return view('admin.category.subcategory.edit')->with('category',$category )
		                                              ->with('subcategory',$subcategory)
													  ->with('allcategories',$allcategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory,$id)
    {
            $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $category = Subcategory::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
//            delete old image
            if (Storage::disk('public')->exists('category/'.$category->image))
            {
                Storage::disk('public')->delete('category/'.$category->image);
            }
//            resize image for category and upload
            $categoryimage = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('category/'.$imagename,$categoryimage);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('category/slider'))
            {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            //            delete old slider image
            if (Storage::disk('public')->exists('category/slider/'.$category->image))
            {
                Storage::disk('public')->delete('category/slider/'.$category->image);
            }
            //            resize image for category slider and upload
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('category/slider/'.$imagename,$slider);

        } else {
            $imagename = $category->image;
        }

        $category->name = $request->name;
        $category->slug = $slug;
		$category->description = $request->body;
		$category->priority = $request->priority;
		$category->category_id = $request->category_id;
		//$category->status = $request->status;
        $category->image = $imagename;
        $category->save();
        Toastr::success('Sub-Category Successfully Updated :)' ,'Success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory,$id)
    {
        
        $category = Subcategory::find($id);
        if (Storage::disk('public')->exists('category/'.$category->image))
        {
           Storage::disk('public')->delete('category/'.$category->image);
        }

        if (Storage::disk('public')->exists('category/slider/'.$category->image))
        {
            Storage::disk('public')->delete('category/slider/'.$category->image);
        }
        $category->delete();
        Toastr::success('Sub-Category Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
