<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
// \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::get('/','HomeController@index')->name('home');
//Route::get('about','HomeController@indexAbout')->name('about');
Route::get('contact','HomeController@indexContact')->name('contact');
Route::get('expertize','HomeController@indexExpertize')->name('expertize');
Route::get('sponsorscholarship','HomeController@indexSponsorscholarship')->name('sponsorscholarship');
Route::get('donation','HomeController@indexDonation')->name('donation');
Route::post('contact','HomeController@contactStore')->name('contact.store');
Route::get('service','HomeController@indexService')->name('service');
Route::get('faq','HomeController@indexFaq')->name('faq');
Route::get('news','HomeController@indexVolunteer')->name('volunteer');
Route::get('news/{news_id}','HomeController@SinglePostShow')->name('singlepost');
Route::get('pagination/{id}','HomeController@pagination')->name('pagination');
Route::get('general-notice','HomeController@indexGeneralNotice')->name('general.notice');
Route::get('employee-notice','HomeController@indexEmployeeNotice')->name('employee.notice');
Route::get('press','HomeController@indexJobNotice')->name('job.notice');
Route::get('background','HomeController@indexBackground')->name('background');
Route::get('mission','HomeController@indexMission')->name('mission');
Route::get('vission','HomeController@indexVission')->name('vission');
Route::get('our-success','HomeController@indexGoals')->name('goals');
Route::get('article','HomeController@indexCore')->name('core');
Route::get('aganagor','HomeController@aganagor')->name('aganagor');
Route::get('central-committe','HomeController@indexBody')->name('nationbody');
Route::get('internationbody','HomeController@indexInter_Body')->name('internationbody');
Route::get('boardmember','HomeController@BoradOfMember')->name('boardmember');
Route::get('academicteam','HomeController@academicteam')->name('academicteam');
Route::get('administration','HomeController@administration')->name('administration');
Route::get('personel','HomeController@personel')->name('personel');
Route::get('partners','HomeController@partners')->name('partners');
Route::get('donars','HomeController@donars')->name('donars');
Route::get('freedom-fighter/{subtat_id}','HomeController@freedomFighter')->name('freedom.fighter');
Route::get('freedom-fighter/signle-fighter/{id}','HomeController@SingleFighter')->name('single.fighter');
Route::get('rules-of-apply','HomeController@indexScholarship1')->name('scholarship1');
Route::get('scholarship2','HomeController@indexScholarship2')->name('scholarship2');
Route::get('registration','HomeController@indexApplyScholarship1')->name('applyscholarship1');
Route::get('applyscholarship2','HomeController@indexApplyScholarship2')->name('applyscholarship2');


Route::post('scholarship_store','HomeController@StoreScholarshipInfo')->name('scholarship_store');


Route::get('login','AuthController@index')->name('login')->middleware('guest');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('logout','AuthController@logout')->name('logout');
Route::get('register','AuthController@registration')->name('register')->middleware('guest');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('reset-mail','AuthController@SendResetMail')->name('reset-mail');
Route::get('verify','AuthController@verify')->name('verify');
Route::get('code-verification','AuthController@CodeVerification')->name('CodeVerification');
Route::get('reset-password','AuthController@ResetPassword')->name('ResetPassword');
Route::get('update-new-password','AuthController@UpdateNewPassword')->name('update.newpassword');
//Route::get('sendSMS','AuthController@sendSms')->name('sendsms');
Route::post('subscriber','SubscriberController@store')->name('subscriber.store');
	 
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
       Route::get('dashboard','DashboardController@index')->name('dashboard');
	   Route::resource('tag','TagController');
	   Route::get('/tag/{tag_id}/all','TagController@indexallsubtag')->name('tag.notice');
	   Route::resource('sub-tag','SubTagController');
	   Route::get('/sub-tag/{subtag_id}/all','SubTagController@indexSubtag')->name('subtag.personel');
	   Route::get('/personel/subtag','SubTagController@fetch')->name('subtag.fetch');
	   Route::resource('category','CategoryController');
	   Route::get('/category/{category_id}/all','CategoryController@indexCcategory')->name('category.notice');
	   Route::resource('sub-category','SubCategoryController');
	   Route::get('/sub-category/{subcategory_id}/all','SubCategoryController@indexSubcategory')->name('subcategory.notice');	   
	   Route::resource('slider','SliderController');
	   Route::resource('service','ServiceController');
	   Route::resource('post','PostController');
	   Route::resource('contact','ContactController');
	   Route::get('donation','ContactController@indexdonation')->name('donation.contact');
	   Route::get('shareexperience','ContactController@indexshareexperience')->name('shareexperience.contact');
	   Route::get('scholarshipsponsor','ContactController@indexscholarshipsponsor')->name('scholarshipsponsor.contact');
	   Route::get('connect','ContactController@indexconnet')->name('connect.contact');
	   Route::resource('notice','NoticeController');
	   Route::resource('gallery','GalleryController');
	   Route::resource('video','VideoController');
	   Route::get('general','NoticeController@indexgeneral')->name('general.notice');
	   Route::get('employee','NoticeController@indexemployee')->name('employee.notice');
	   Route::get('jobcircular','NoticeController@indexjobcircular')->name('jobcircular.notice');
	   Route::resource('user','UserController');
	   Route::resource('personel','PersonelController');
	   Route::resource('registration','ScholarshipController');
	   Route::get('/data','ScholarshipController@fetchdata')->name('scholarship.data');
	   Route::get('/scholarship1','ScholarshipController@indexscholarship1')->name('scholarship1');
	   Route::get('/scholarship2','ScholarshipController@indexscholarship2')->name('scholarship2');	   
	   Route::get('/pending/post','PostController@pending')->name('post.pending');
       Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');
	   Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
	   Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');
	   Route::get('settings','SettingsController@index')->name('settings');
	   Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
	   Route::get('password-update','SettingsController@password_update')->name('password-update');
	   Route::put('password-update','SettingsController@updatePassword')->name('password.update');
     });
	 
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){
       Route::get('dashboard','DashboardController@index')->name('dashboard');
	   Route::resource('post','PostController');
	   Route::get('settings','SettingsController@index')->name('settings');
	   Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
	   Route::get('password-update','SettingsController@password_update')->name('password-update');
	   Route::put('password-update','SettingsController@updatePassword')->name('password.update');
     });


