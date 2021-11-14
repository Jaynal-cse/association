<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Scholarship1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = scholarship1::select('id','scholarship_name','std_name','std_result','image')->orderBy('std_result','desc')->get();
        return view('admin.scholarship.index')->with('posts',$posts);
    }
	
	public function indexscholarship1()
    {   
        $posts = scholarship1::select('id','scholarship_name','std_name','std_result','image')->where('scholarship_name','Scholarship 1')->orderBy('std_result','desc')->get();
        return view('admin.scholarship.index')->with('posts',$posts);
    }
	
	public function indexscholarship2()
    {   
        $posts = scholarship1::select('id','scholarship_name','std_name','std_result','image')->where('scholarship_name','Scholarship2')->orderBy('std_result','desc')->get();
        return view('admin.scholarship.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scholarship1  $scholarship1
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship1 $scholarship1,$id)
    {
        //dd($scholarship1);
		$post = Scholarship1::find($id);
		//dd($posts);
        return view('admin.scholarship.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scholarship1  $scholarship1
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship1 $scholarship1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scholarship1  $scholarship1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship1 $scholarship1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scholarship1  $scholarship1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship1 $scholarship1,$id)
    {    $post=$scholarship1::find($id);
	     //dd($sgsdgd);
        if (Storage::disk('public')->exists('scholarship/'.$post->image))
        {
            Storage::disk('public')->delete('scholarship/'.$post->image);
        }
        //dd($scholarship1->image);
        $post->delete();
        Toastr::success('Applicant Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
