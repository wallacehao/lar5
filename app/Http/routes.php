<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['prefix'=>'/', 'namespace'=>'User'],function() {
    Route::get('/',['as'=>'/', 'uses'=>'MainController@getIndex']);
    Route::get('the-loai/{id}/{alias}.html',['as'=>'cate','uses'=>'MainController@getCate'])->where('id','[0-9]+');
    Route::get('chi-tiet-tin/{id}/{alias}.html',['as'=>'detail','uses'=>'MainController@getDetail'])->where('id','[0-9]+');
});






Route::get('dt_login',  ['as' => 'getLogin',  'uses'  => 'LoginController@getLogin']);
Route::post('dt_login', ['as' => 'postLogin', 'uses'  => 'LoginController@postLogin']);
Route::get('dt_logout', ['as' => 'getLogout',  'uses' => 'LoginController@getLogout']);
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dt_admin', 'namespace'=>'Admin'],function(){
    	// Route For DashBoard
    	Route::get('/',function() {
            $starUser = DB::table("qt64_users")->count();
            $starCate = DB::table("qt64_category")->count();
            $starNews = DB::table("qt64_news")->count();
    		return view('admin.module.dashboard.dashboard',['starUser'=>$starUser, 'starCate'=>$starCate, 'starNews'=>$starNews]);
    	});

    	// Route For Category
    	Route::group(['prefix'=>'category'],function(){
    		Route::get('add',         ['as'=>'getCateAdd',   'uses' => 'CateController@getCateAdd' ]);
            Route::post('add',        ['as'=>'postCateAdd',  'uses' => 'CateController@postCateAdd' ]);
            Route::get('list',        ['as'=>'getCateList',  'uses' => 'CateController@getCateList' ]);
            Route::get('delete/{id}', ['as'=>'getCateDel',   'uses' => 'CateController@getCateDel' ])->where('id','[0-9]+');
    	    Route::get('edit/{id}',   ['as'=>'getCateEdit',  'uses' => 'CateController@getCateEdit' ])->where('id','[0-9]+');
            Route::post('edit/{id}',  ['as'=>'postCateEdit', 'uses' => 'CateController@postCateEdit' ])->where('id','[0-9]+');
        });

    	// Route For User
    	Route::group(['prefix'=>'user'],function(){
            Route::get('add',  ['as'=>'getUserAdd',        'uses'  => 'UserController@getUserAdd' ]);
            Route::post('add',  ['as'=>'postUserAdd',      'uses'  => 'UserController@postUserAdd' ]);
            Route::get('list', ['as'=>'getUserList',       'uses'  => 'UserController@getUserList' ]);
    	    Route::get('delete/{id}', ['as'=>'getUserDel', 'uses'  => 'UserController@getUserDel' ])->where('id','[0-9]+');
            Route::get('edit/{id}',   ['as'=>'getUserEdit','uses'  => 'UserController@getUserEdit' ])->where('id','[0-9]+');
            Route::post('edit/{id}',  ['as'=>'postUserEdit','uses' => 'UserController@postUserEdit' ])->where('id','[0-9]+');
        });

    	// Route For News
    	Route::group(['prefix'=>'news'],function(){
            Route::get('add', ['as'=>'getNewsAdd',  'uses' => 'NewsController@getNewsAdd']);
            Route::post('add',['as'=>'postNewsAdd', 'uses' => 'NewsController@postNewsAdd']);
            Route::get('list',['as'=>'getNewsList', 'uses' => 'NewsController@getNewsList']);
            Route::get('edit/{id}',['as'=>'getNewsEdit','uses'=>'NewsController@getNewsEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}',['as'=>'getNewsEdit','uses'=>'NewsController@postNewsEdit'])->where('id','[0-9]+');
            Route::get('delete/{id}',['as'=>'getNewsDel','uses'=>'NewsController@getNewsDel'])->where('id','[0-9]+');
    	});

    });
});