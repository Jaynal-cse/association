<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Subtag;
use App\Category;
use App\Slider;
use App\Service;
use App\Contact;
use App\notice;
use App\personel;
use App\Scholarship1;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
    //{
      //  $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
	    //$tags = Tag::latest()->get();
	    $tags = Tag::all();
		$categories = Category::latest()->get();
		$posts = Slider::latest()->take(5)->get();
		//$activites = Post::latest()->take(4)->get();
		$event_category = Category::where('id',23)->first();
		$activites = $event_category->posts()->take(3)->get();
	
	
	
		//$services = Service::latest()->take(6)->get();
		$category = Category::where('id',20)->first();
	    $services = $category->posts()->take(6)->get();
	    
	    
	    
	    $chairman_speeches = personel::where('priority','1')->take(1)->get();
	    $missions = Service::where('title','Mission')->take(1)->get();
	    $vissions = Service::where('title','Vission')->take(1)->get();
	    $goals = Service::where('title','our Goal')->take(1)->get();
	    $cores = Service::where('title','Core Value')->take(1)->get();
		
        return view('index')->with('posts',$posts)
		                    ->with('tags',$tags)
							->with('categories',$categories)
							->with('activites',$activites)
							->with('services',$services)
							->with('chairman_speeches',$chairman_speeches)
							->with('missions',$missions)
							->with('vissions',$vissions)
							->with('goals',$goals)
							->with('cores',$cores);
							
						
							
    }
	
	
	public function indexAbout()
    {   
	    
        return view('about');
    }
	
	public function indexContact()
    {   
	    $idea = "Connect With the Community";
		$message = "Message";
		$btn_text = "Connect With JBFF";
        return view('contact')->with('idea',$idea)
		                      ->with('message',$message)
							  ->with('btn_text',$btn_text);
    }
	public function indexExpertize()
    {   
	    $idea = "Share Your Expertize";
		$message = "Expertize";
		$btn_text = "Share Your Expertize";
        return view('contact')->with('idea',$idea)
		                      ->with('message',$message)
							  ->with('btn_text',$btn_text);
    }
	
	public function indexSponsorscholarship()
    {   
	    $idea = "Sponsor a Scholarship";
		$message = "Your Proposal";
		$btn_text = "Send Proposal";
        return view('contact')->with('idea',$idea)
		                      ->with('message',$message)
							  ->with('btn_text',$btn_text);
    }
	
	public function indexDonation()
    {   
	    $idea = "Proposal for Donation";
		$message = "Your Proposal";
		$btn_text = "Send Proposal";
        return view('contact')->with('idea',$idea)
		                      ->with('message',$message)
							  ->with('btn_text',$btn_text);
    }
	
	
	
	
	public function indexService()
    {   
	    
        return view('service');
    }
	public function indexFaq()
    {   
	    
        return view('faq');
    }
	
	public function indexVolunteer()
    {   $category = Category::where('id',19)->first();
	    $services = $category->posts()->get();
        return view('volunteer')->with('services', $services);
    }
	
	
	
	public function indexBody()
    {   					 
							 							 
	    $designations =Subtag::where('tag_id',4)->get();		// may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',4)->first();           //name of the office
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('people')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);		
    }
	
	public function indexInter_Body()
	
    {  
       			 
							 
							 
	    $designations =Subtag::where('tag_id',3)->get();		// may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',3)->first();           //name of the office
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('people')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);		
    
    }
	
	public function BoradOfMember()
	{
	
	    $designations =Subtag::where('tag_id',2)->get();		// may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',2)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('people')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);		
    
	}
	public function academicteam()
    {  
          $designations =Subtag::where('tag_id',5)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',5)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('officer')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);			
    }
	
	public function administration()
    {  
	
	 $designations =Subtag::where('tag_id',6)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',6)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('officer')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);	
	
	
    }
    	
		
		public function personel()
    {   
	   $designations =Subtag::where('tag_id',7)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',7)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('officer')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);	
	
    }
	
	public function partners()
    {  
     	$designations =Subtag::where('tag_id',8)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',8)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('officer')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);	
    }
	
	public function donars()
    {   
	
	    $designations =Subtag::where('tag_id',9)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

		//dd($designations);
		$section_name = Tag::select('name','detail')->where('id',9)->first();
        foreach( $designations as  $key => $alldesignation){
			$personels[$key]  = Personel:: where('subtag_id',$alldesignation->id)->get();
		}	
		return view('officer')->with('personels',$personels)
                             ->with('section_name',$section_name)
							 ->with('designations',$designations);	
    }
	
	public function indexScholarship1()
    {   
	
							 
		$scholarship =Subtag::select('id','name','description')->where('id',19)->first();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2
        $personels = Personel::where('subtag_id',19)->get();
		 
		
		return view('scholarship')->with('personels',$personels)
                             ->with('scholarship',$scholarship);						 
    }
	
	public function indexScholarship2()
    {   $scholarship =Subtag::select('id','name','description')->where('id',20)->first();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2
        $personels = Personel::where('subtag_id',20)->get();
		 
		
		return view('scholarship')->with('personels',$personels)
                             ->with('scholarship',$scholarship);	
    }
	
	public function indexApplyScholarship1()
    {   $scholarship =Subtag::select('id','name','description')->where('id',19)->first();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2
        $personel = Personel::where('subtag_id',19)->latest()->take(1)->get();
		//dd($personel);
        return view('apply_scholarship')->with('scholarship',$scholarship)
		                                ->with('personel',$personel);
		                                
    }
	
	public function indexApplyScholarship2()
    {   
	$scholarship =Subtag::select('id','name','description')->where('id',20)->first();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2
        $personel = Personel::where('subtag_id',20)->latest()->take(1)->get();
		//dd($personel);
        return view('apply_scholarship')->with('scholarship',$scholarship)
		                                ->with('personel',$personel);
		                                
    }
	
	public function StoreScholarshipInfo(Request $request){
		
		$this->validate($request,[
            'student_scholarship' => 'required',
            'student_name' => 'required',
            'student_fname' => 'required',
            'student_mname' => 'required',
            'student_dob' => 'required',
			'student_address' => 'required',
			'student_phone' => 'required',
			'student_email' => 'required',
			'image' => 'required',
			'student_exam' => 'required',
			'student_group' => 'required',
			'student_board' => 'required',
			'student_year' => 'required',
			'student_roll' => 'required',
			'student_regi' => 'required',
			'student_result' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('scholarship'))
            {
                Storage::disk('public')->makeDirectory('scholarship');
            }

            $postImage = Image::make($image)->resize(720,720)->stream();
            Storage::disk('public')->put('scholarship/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Scholarship1();
        
        $post->scholarship_name = $request->student_scholarship;
		$post->std_name = $request->student_name;
		$post->father_name = $request->student_fname;
		$post->mother_name = $request->student_mname;
		$post->DOB = $request->student_dob;
		$post->present_address = $request->student_address;
		$post->phone = $request->student_phone;
		$post->email = $request->student_email;
        $post->image = $imageName;
		$post->exam_name = $request->student_exam;
		$post->group_name = $request->student_group;
		$post->board_name = $request->student_board;
		$post->passing_year = $request->student_year;
		$post->std_roll = $request->student_roll;
		$post->std_reg = $request->student_regi;
		$post->std_result = $request->student_result;       
        $post->save();		
        Toastr::success('Your Application Successfully Send.Wish Your best Success :)','Success');
        return redirect()->back();
		
		
	}
	
	
	
	public function indexGeneralNotice()
    {   //id of general notice is 8
	    $notices = notice::where('subcategory_id',1)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices);
    }
	public function indexEmployeeNotice()
    {   //id of general notice is 9
	    $notices = notice::where('subcategory_id',2)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices);
    }
	public function indexJobNotice()
    {   //id of general notice is 10
	    $notices = notice::where('subcategory_id',3)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices);
    }
	
	public function indexBackground()
    {   
	    $page_title = "Our Background";
	    $services = Service::where('title','Our Background')->take(1)->get();
		
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	public function indexMission()
    {   
	    $page_title = "Our Mission";
	    $services = Service::where('title','Mission')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	
	public function indexVission()
    {   
	    $page_title = "Our Vission";
	    $services = Service::where('title','Vission')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	public function indexGoals()
    {   
	    $page_title = "Our Goals";
	    $services = Service::where('title','Our Goal')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	public function indexCore()
    {   
	    $page_title = " Our Core Values";
	    $services = Service::where('title','Core Value')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	
	public function contactStore(Request $request){
		$this->validate($request,[
            'email' => 'email|required',
			'phone' => 'required |min:11|max:11',
		    'name'   => 'required',
			'body'   => 'required'
        ]);

        $contact = new contact();
		$contact->name = $request->name;
		$contact->phn = $request->phone;
        $contact->email = $request->email;
		$contact->connect_type = $request->connect_type;
		$contact->body = $request->body;
        $contact->save();
        Toastr::success('Your message is Successfully sent to JBFF.JBFF will reply your message :)','Success');
        return redirect()->back();
	}
}
