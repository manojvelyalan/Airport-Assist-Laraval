<?php
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

//main website...

Route::get('/', 'Main\HomeController@index')->name('home');
Route::post('/','Main\HomeController@store');

//service..

Route::get('/service','Main\HomeController@service')->name('service');

//book service ..

Route::get('/bookservice','Main\HomeController@book')->name('bookservice');

// airport served...

Route::get('/airportserved','Main\HomeController@served')->name('airportserved');


//faq..

Route::get('/faq','Main\HomeController@faq')->name('faq');

//legal..
Route::get('/legal','Main\HomeController@legal')->name('legal');

//blogs ..

Route::get('/traveltips','Main\MainBlogController@index')->name('traveltips');
Route::get('/traveltips/{blog}/{title}','Main\MainBlogController@details')->name('traveldetails');

//subscription

Route::Resource('/subscription','Main\SubscriptionController');
Route::post('/blog/subscription','Main\SubscriptionController@subscription')->name('blogsubscription');

//blog comments..

Route::post('/comments','Main\MainBlogController@comments')->name('comments');

 // Contact

 Route::get('/contact','Main\ContactController@contact')->name('contact');

 Route::post('/contact','Main\MailController@contact_send');



// Dashboard...

Route::get('/admin/dashboard','DashboardController@index')->name('dashboard');

//Admin Authentication...

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});
// admin user..

Route::get('/admin/user/list', 'Auth\RegisterController@index')->name('adminuserlist');
Route::get('/admin/user/{user}/edit', 'Auth\RegisterController@edit')->name('adminuseredit');
Route::put('/admin/user/{user}', 'Auth\RegisterController@update')->name('adminupdate');
Route::delete('/admin/user/{user}', 'Auth\RegisterController@destroy')->name('admindelete');


// Action

Route::resource('/admin/action','ActionController');

//Department..

Route::resource('/admin/department','DepartmentController');

//Assign Action to Department

Route::get('/admin/assign','AssignActiontoDepartment@assign')->name('actionassign');
Route::get('/admin/assign/{department}', 'AssignActiontoDepartment@details')->name('assign.details');
Route::put('/admin/assign/{department}', 'AssignActiontoDepartment@addRole');

//Request

Route::resource('/admin/request','RequestController');
Route::put('/admin/request/{request}/status','RequestController@changeStatus')->name('changerequeststatus');

//Vendors...

Route::resource('/admin/vendor','VendorController');
Route::get('/admin/vendors/assign','VendorController@assign')->name('assignvendor');
Route::post('/admin/vendors/vendorassign','VendorController@assignVendor');
Route::get('/admin/vendors/listassignedairport','VendorController@listassignedairport')->name('assignedairport');
Route::get('/admin/vendors/{vendor}/airportlist','VendorController@airportlist');
Route::DELETE('/admin/vendors/{vendor}/{airport}/detach','VendorController@detach');

// Airport List

Route::get('admin/airport/autocomplete', 'AirportController@autocomplete')->name('autocomplete');


//Services
Route::get('/admin/service/{serviceType}/services','ServiceController@services');


//Mailer..

// Send invoice..
  Route::get('/admin/mail/invoice','MailController@invoice')->name('sendinvoice');
  Route::post('/admin/mail/sendinvoice','MailController@sendInvoice');

//send confirmation..

Route::get('/admin/mail/confirmation','MailController@confirmation')->name('sendconfirmation');
Route::post('/admin/mail/confirmation','MailController@sendConfirmation');
Route::post('/admin/mail/details','MailController@details')->name('requestdetails');
Route::get('/admin/mail/{serviceCode}/show','MailController@showRequest');

// blogs  ....

 Route::resource('/admin/blogs','BlogController');

 //blogs comments

 Route::resource('/admin/blog-comments','BlogCommentController');
 Route::put('/admin/blog-comment/{blog_comment}/approve','BlogCommentController@approve');


 // Report...
Route::get('/admin/report/paid','ReportController@paid')->name('paymentreport');
Route::post('/admin/report/paid','ReportController@processPaid');
Route::get('/admin/report/responded','ReportController@individualRespondedReport')->name('responderreport');
Route::post('/admin/report/responded','ReportController@respond');
