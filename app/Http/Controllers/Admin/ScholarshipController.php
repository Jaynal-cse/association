<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Scholarship1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;


class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      return view('admin.scholarship.index');   
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
        $this->validate($request,[
		     'name' =>  'required',
            'email' => 'required|email|unique:subscribers',
			'phone' => 'required|max:11|min:11|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
		$subscriber->name = $request->name;
        $subscriber->email = $request->email;
		$subscriber->phone = $request->phone;
		$subscriber->save();
        //Toastr::success('You Successfully added to our subscriber list :)','Success');
		return json_encode(['success' => 'subscriber added']);
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scholarship1  $scholarship1
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship1 $scholarship1,$id)
    {
	 $data = Scholarship1::where('id',$id)->first();
	 
      return json_encode($data);
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
    {    
    }
	
	
	public function fetchdata(){
		 $contact = Scholarship1::all();
		  
		   return Datatables::of($contact)
		     ->addIndexColumn() //to add serial number 
	         ->addColumn('action',function($contact){
			 return '<a  onclick="showData('.$contact->id.')"  class="btn btn-success waves-effect"><i class="icon-eye-open" style="font-size:18px" ></i></a>'.' '.
               '<a  onclick="deleteData('.$contact->id.')"  class="btn btn-sm btn-danger"><i class="icon-trash"></i></a>';
			   
			 })->make(true);
			 
	}
}
