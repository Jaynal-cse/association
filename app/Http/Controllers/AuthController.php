<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PassworeResetMail;
use Brian2694\Toastr\Facades\Toastr;
use Twilio\Rest\Client;
use Auth;
use App\User;
use App\Post;
use Session;
use Hash;
use DB;
use Carbon\Carbon; 
use Mail; 

class AuthController extends Controller
{  

   
   public function index(){
	   return view('login');
   }
   
   public function registration(){
	   return view('register');
   }
   public function postLogin(Request $request)
    {
        //dd($request['password']);
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
			   
			if(Auth::check() && Auth::user()->role->id == 1)
       
			  {
			
				return redirect()->route('admin.dashboard');
		   
			   } 
		    else {
			   
			      return redirect()->route('author.dashboard');
	  
				}
  
			
			
        }
        
        return Redirect()->back();
    }
	
	public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
	
	public function postRegistration(Request $request)
    {  
        request()->validate([
		'name' => 'required',
        'username' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
        //dd($request); 
        $user = new User();
		$user->name = $request->name;
		$user->username = $request->username;
		$user ->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
       
        return Redirect('login');
    }
    
    
    public function SendResetMail(Request $request){
               
	     request()->validate([
		
        'email' => 'required|email',
        
        ]);
			   
		
		
        
		$user = User::where('email',$request->email)->first();
		
		if($user){
			     //$token = str_random(64);
				 
				 $token = rand(100000 , 999999);
				 
				DB::table('password_resets')->insert([
					   'email'  => $request->email,
					   'token'	=> $token,
					   'created_at' => Carbon::now()			   
				]);
				$user['token'] = $token;
				/*
				//Send Email Notification to Email Address
				Notification::route('mail',$user->email)
							->notify(new PassworeResetMail($user));
							
				
				//Send SMS Notification to Registered Phone Number
				$receiverNumber ="+88".$user->phone;;
                $message = "Your OTP code is ".$token ." .Please use this Code to reset your password.";
               
   			   try {
                       $account_sid = getenv("TWILIO_SID");
                       $auth_token = getenv("TWILIO_TOKEN");
                       $twilio_number = getenv("TWILIO_FROM");
                       $client = new Client($account_sid, $auth_token);
                       $client->messages->create($receiverNumber, [
                               'from' => $twilio_number, 
                               'body' => $message]);
                    } catch (Exception $e) {
                        }
            */

        
				
		    
				
				
				Toastr::success('We Send an OTP by  Email and SMS to your registered Email and Phone number.Please type that OTP code within 10 minutes.:)','Success');			
				
				return redirect()->route('verify');
				}else{
			
			
			Toastr::error('Your credential does not match or Expire. :)','Error');
            return redirect()->back();
		}
    }
	
	public function verify(){
		
		return view('authentication.verify');
	}
	
	
	public function CodeVerification( Request $request){
		request()->validate([
		  'code' => 'required',
		
		]);
		
		//dd($request->code);
		//DB::table('password_resets')->where('code',$request->code)
		                           // ->where('email',$request->email)->get();
		
		$PasswordResetInfos = DB::table('password_resets')->where('token',$request->code)->first();
		
			if(isset($PasswordResetInfos)){
				if($PasswordResetInfos->token == $request->code){
					//dd($PasswordResetInfos->token);
					 $passTokenToResetPassword = $PasswordResetInfos->token;
					 $passEmailToResetPassword = $PasswordResetInfos->email;
					//return redirect()->route('ResetPassword');
					return view('authentication.passwordresetform')->with('passTokenToResetPassword',$passTokenToResetPassword)
					                                               ->with('passEmailToResetPassword',$passEmailToResetPassword);
				}
			}
			else{
				Toastr::error('Your OTP does not match :)','Error');
                return redirect()->back();
			}
	}
	
	
	
	public function UpdateNewPassword(Request $request){
		$this->validate($request, [
		   'password' => 'required|confirmed',
		  
		]);
		
		//dd($request->code);
		
		$PasswordResetInfo = DB::table('password_resets')->where('token',$request->code)
		                                                 ->where('email',$request->email)->first();
		$Update_Password = User::where('email',$PasswordResetInfo->email)->first();
		$Update_Password->password = Hash::make($request->password);
		$Update_Password->save();
		DB::table('password_resets')->where('token',$request->code)->delete();
		
		$all_reset_codes = $users = DB::select('select * from password_resets'); //it will get entire table
		foreach($all_reset_codes as $all_reset_code){
			
			  $created_at = Carbon::parse($all_reset_code->created_at);
			  $current_at = Carbon::parse(Carbon::now());
		      $totalDuration = $current_at->diffInMinutes($created_at);
			  if($totalDuration>10){
				  DB::table('password_resets')->where('token',$all_reset_code->token)->delete();
			  }
					
		}
		
		
		Toastr::success('Congratulation! Password Updated Successfully :)','Success');
		return redirect()->route('login');
		
		
		
		
		
		
		
	}
}



