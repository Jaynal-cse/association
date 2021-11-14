<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\notice;
use App\Category;
use App\Subcategory;
use App\Tag;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
	use Carbon\Carbon;
	

	use Illuminate\Support\Facades\Auth;
	
	use Illuminate\Support\Facades\Storage;
	use Intervention\Image\Facades\Image;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Notice::latest()->get();
        return view('admin.notice.index')->with('posts',$posts);  
    }
	
	public function indexgeneral()
    {
        $posts = notice::where('subcategory_id',1)->orderBy('created_at','desc')->get();
        return view('admin.notice.index')->with('posts',$posts);  
    }
    public function indexemployee()
    {
        $posts = notice::where('subcategory_id',2)->orderBy('created_at','desc')->get();
        return view('admin.notice.index')->with('posts',$posts);  
    }
	public function indexjobcircular()
    {
        $posts = notice::where('subcategory_id',3)->orderBy('created_at','desc')->get();
        return view('admin.notice.index')->with('posts',$posts);  
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
        return view('admin.notice.create')->with('categories',$categories)
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

            'image' => 'required|mimes:pdf,xlx,csv,docx,doc,zip,jpg|max:2048',
			'category' =>'required',

        ]);
        $notice = new Notice();
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//           
            $currentDate = Carbon::now()->toDateString();
            $imageName  =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('notice'))
            {
                Storage::disk('public')->makeDirectory('notice');
            }
            $filePath = $image->storeAs('notice', $imageName, 'public');
            

        } else {
            $imageName = "abc.pdf";
        }
      
     
        $notice->title = $request->title;
        $notice->image = $imageName;
        $notice->subcategory_id = $request->category;		
        $notice->save();

        Toastr::success('Notice Successfully Saved :)','Success');
        return redirect()->route('admin.notice.index');

        

   

        
		

        Toastr::success('Notice Successfully Saved :)','Success');
        return redirect()->route('admin.notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(notice $notice)
    {
       if (Storage::disk('public')->exists('notice/'.$notice->image))
        {
            Storage::disk('public')->delete('notice/'.$notice->image);
        }
        
        $notice->delete();
        Toastr::success('Notice Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
