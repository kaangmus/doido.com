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
    Route::get('product','indexController@product');
    Route::get('product-{id}','indexController@productDetail');
    Route::get('list-product-render-{id}','indexController@listProduct');
    Route::get('blog-{id}','indexController@blog');
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
        Route::post('/','commentController@addItem');
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
       Route::group(['prefix'=>'messaging'],function (){
          Route::get('/','messagingController@listAll');
       });
   });

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
