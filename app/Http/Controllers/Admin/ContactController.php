<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\Tag;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index')->with('contacts',$contacts);
    }
	
	public function indexdonation()
    {
        $contacts = Contact::where('connect_type','Proposal for Donation')->latest()->get();
        return view('admin.contact.index')->with('contacts',$contacts);
    }
    
	public function indexshareexperience()
    {
        $contacts = Contact::where('connect_type','Share Your Expertize')->latest()->get();
        return view('admin.contact.index')->with('contacts',$contacts);
    }
	
	public function indexscholarshipsponsor()
    {
        $contacts = Contact::where('connect_type','Sponsor a Scholarship')->latest()->get();
        return view('admin.contact.index')->with('contacts',$contacts);
    }
	
	public function indexconnet()
    {
        $contacts = Contact::where('connect_type','Connect With the Community')->latest()->get();
        return view('admin.contact.index')->with('contacts',$contacts);
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contact.show')->with('categories',$categories)
		                              ->with('tags',$tags)
									  ->with('contact',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        
        $contact->delete();
        Toastr::success('Message Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
