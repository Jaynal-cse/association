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
use App\Gallery;
use App\Scholarship1;
use App\Video;
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
		$secratery_speeches = personel::where('priority','2')->take(1)->get();
	    $missions = Service::where('title','Mission')->take(1)->get();
	    $vissions = Service::where('title','Vission')->take(1)->get();
	    $goals = Service::where('title','our Goal')->take(1)->get();
	    $cores = Service::where('title','Core Value')->take(1)->get();
		$galleries = Gallery::latest()->take(6)->get();
		$videos = Video::latest()->take(6)->get();
		
        return view('index')->with('posts',$posts)
		                    ->with('tags',$tags)
							->with('categories',$categories)
							->with('activites',$activites)
							->with('services',$services)
							->with('chairman_speeches',$chairman_speeches)
							->with('secratery_speeches',$secratery_speeches)
							->with('missions',$missions)
							->with('vissions',$vissions)
							->with('goals',$goals)
							->with('cores',$cores)
							->with('galleries',$galleries)
							->with('videos',$videos);
							
						
							
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
    {   $category = Category::where('id',20)->first();
	    $services = $category->posts()->paginate(5);
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
	   $designations =Subtag::where('tag_id',21)->get();		// id of academic team tag id = 5 may more subtag/designations are exists for tag_id 2

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
            
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'dob' => 'required',
			'word' => 'required',
			'permanent_address' => 'required',
			'present_address' => 'required',
			'phone' => 'required',
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
		$post->name = $request->name;
		$post->fname = $request->fname;
		$post->mname = $request->mname;
		$post->DOB = $request->dob;
		$post->nid = $request->nid;
		$post->word = $request->word;
		$post->permanent_address = $request->permanent_address;
		$post->present_address = $request->present_address;
		$post->phone = $request->phone;
		$post->image =  $imageName;
		$post->email = $request->email;
		$post->operator = $request->operator;
		$post->number= $request->number;
		$post->transid = $request->transid;       
        $post->save();	
		return json_encode(['success' => 'subscriber added']);
		
		
	}
	
	
	
	public function indexGeneralNotice()
	
    {   //id of general notice is 8
	    $page_title = "সাধারণ নোটিশ  বোর্ড";
	    $notices = notice::where('subcategory_id',1)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices)
		                     ->with('page_title',$page_title);
    }
	public function indexEmployeeNotice()
    {   //id of general notice is 9
	     $page_title = "সদস্য নোটিশ বোর্ড";
	    $notices = notice::where('subcategory_id',2)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices)
		                     ->with('page_title',$page_title);
    }
	public function indexJobNotice()
    {   //id of general notice is 10
	    $page_title = "প্রেস বিজ্ঞপ্তি বোর্ড";
	    $notices = notice::where('subcategory_id',3)->orderBy('created_at','desc')->get();
        return view('notice')->with('notices',$notices)
		                      ->with('page_title',$page_title);
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
	    $page_title = "Success";
	    $services = Service::where('title','Our Success')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	public function indexCore()
    {   
	    $page_title = "গঠনতন্ত্র";
	    $services = Service::where('title','গঠনতন্ত্র')->take(1)->get();
        return view('background')->with('services',$services)
		                         ->with('page_title',$page_title);
    }
	public function aganagor()
    {   
	    $page_title = "আগানগর মুক্তিযুদ্ধের ঘটনাবলী";
	    $services = Service::where('title','আগানগর ')->take(1)->get();
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
	
	public function SinglePostShow($id){
		$service = Post::where('id',$id)->first();
		foreach($service->categories as $category){
		     $categoryId=$category->id;
		}
		
		
		$category = Category::where('id',$categoryId)->first();  
		$next_all_record =$category->posts()->orderBy('id','asc')->get();//select all post of the category order by id
		$only_next_record = $next_all_record->where('id','>',$id)->first(); //select the first post among all post of next_all_record 
		
		$previous_all_record = $category->posts()->orderBy('id','DESC')->get();
		$only_previous_record = $previous_all_record->where('id','<',$id)->first(); 
		
	
		return view('single')->with('service',$service)
		                     ->with('only_next_record',$only_next_record)
		                     ->with('only_previous_record',$only_previous_record);
							
                        						 
		
		}
		
	public function freedomFighter($id){
		$subtagInfo = Subtag::where('id',$id)->first();
		$freedomFighters = Personel::where('subtag_id',$id)->orderBy('priority','asc')->get();
		return view('officer')->with('subtagInfo',$subtagInfo)
		                      ->with('freedomFighters',$freedomFighters);
	}
	
	public function SingleFighter($id){
		$figterInfo=Personel::where('id',$id)->first();
		$subtag_name=Subtag::where('id',$figterInfo->subtag_id)->first();
		return view('single_person')->with('figterInfo',$figterInfo)
		                            ->with('subtag_name',$subtag_name);
	}
	
	
}
