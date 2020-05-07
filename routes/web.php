<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

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
Route::group(['namespace'=>'Front'],function (){
    Route::get('test',function (){
       return view('front.detailProduct');
    });
    Route::get('/','indexController@indexShow');
    Route::get('search/{search}','indexController@searchItem');
    Route::get('search','indexController@getsearch');
    Route::get('searchprice','indexController@searchPrice');
    Route::get('product','indexController@product');
    Route::get('product-{id}','indexController@productDetail');
    Route::post('product-{id}','indexController@addComment');
    Route::group(['prefix'=>'cart'],function (){
        Route::get('/','cartController@cartShow');
        Route::post('/','cartController@addItem');
        Route::get('delete/{id}','cartController@deleteItem');
        Route::get('pay','cartController@pay');
    });
    Route::group(['prefix'=>'order','middleware'=>'checklogin'],function (){
        Route::get('/{id}','orderController@showOrder');
        Route::post('/{id}','orderController@addOrder');
    });
    Route::group(['prefix'=>'comment'],function(){
        Route::get('delete/{id}','commentController@deleteItem');
    });
});
Route::group(['namespace'=>'Admin'],function(){
   Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function(){
      Route::get('/','indexController@indexShow');
      Route::get('user/add','profileController@addShow');
      Route::post('user/add','profileController@addItem');
      Route::group(['prefix'=>'profile'],function ()
      {
         Route::get('/','profileController@showItem');
         Route::post('/','profileController@updateItem');
         Route::get('user','profileController@listAll');
         Route::get('update/{id}','profileController@updateShow');
         Route::post('update/{id}','profileController@updateUser');
         Route::get('delete/{id}','profileController@deleteItem');

      });
       Route::group(['prefix'=>'category'],function (){
           Route::get('/','categoryController@listAll');
           Route::post('/','categoryController@addItem');
           Route::get('update','categoryController@updateItem');
           Route::get('delete/{id}','categoryController@deleteItem');
       });
       Route::group(['prefix'=>'product'],function(){
            Route::get('/','productController@listAll');
            Route::get('add','productController@addShow');
            Route::post('add','productController@addItem');
            Route::get('update/{id}','productController@updateShow');
            Route::post('update/{id}','productController@updateItem');
            Route::get('delete/{id}','productController@deleteItem');
       });
       Route::group(['prefix'=>'ordermanger'],function (){
          Route::get('/','orderController@listAll');
          Route::get('delete/{id}','orderController@deleteItem');
          Route::get('detail/{id}','orderController@detailItem');
          Route::get('status/{id}/{status}','orderController@updateStatus');
       });
       Route::group(['prefix'=>'messenger'],function (){
          Route::get('/','messagingController@listAll');
          Route::post('new','messagingController@addItem');
          Route::get('chat/{id}','messagingController@chatItem');
          Route::post('chat/{id}','messagingController@addChat');
       });
   });

   Route::get('forget','indexController@forgetPassword');
   Route::post('forget','indexController@getPassword');

   //-------------------------------------------
   Route::group(['prefix'=>'login','middleware'=>'checklogout'],function(){
       Route::get('/','indexController@showLogin');
       Route::post('/','indexController@checkLogin');
    });
   Route::get('logout','indexController@logout');
   Route::get('register','indexController@showRegister');
   Route::post('register','indexController@register');
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
