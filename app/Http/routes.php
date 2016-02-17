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
* 	Front end for guest manage 
*/

/**
*	Home page
*/
Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@home']);
Route::get('san-pham/{id}/{tenloai}', ['as' => 'sanpham', 'uses' => 'WelcomeController@sanpham']);
Route::get('chi-tiet-san-pham/{id}/{chitietsanpham}', ['as' => 'chitietsanpham', 'uses' => 'WelcomeController@chitietsanpham']);
Route::get('mua-hang/{id}/{size}/{color}/{qty}', ['as' => 'muahang', 'uses' => 'WelcomeController@muahang']);
Route::get('gio-hang', ['as' => 'giohang', 'uses' => 'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}', ['as' => 'xoasanpham', 'uses' => 'WelcomeController@xoasanpham']);
Route::get('update-san-pham/{rowid}/{qty}', ['as' => 'updatesanpham', 'uses' => 'WelcomeController@updatesanpham']);
Route::get('about', ['as' => 'about', 'uses' => 'WelcomeController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'WelcomeController@contact']);
Route::post('contact', ['as' => 'postContact', 'uses' => 'WelcomeController@postContact']);
Route::get('blog', ['as' => 'blog', 'uses' => 'WelcomeController@blog']);
Route::get('baiviet/{id}/{slug}', ['as' => 'baiviet', 'uses' => 'WelcomeController@baiviet']);
Route::post('dat-hang', ['as' => 'dathang', 'uses' => 'WelcomeController@dathang']);

/**
*	Admin handle 
*/
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
	/**
	*  Order manage in admin 
	*/
	Route::group(['prefix' => 'order'], function () {
		Route::get('order-new/{seach?}', ['as' => 'admin.order.getOrderNew', 'uses' => 'OrderController@getOrderNew']);
		Route::post('order-new/{seach?}', ['as' => 'admin.order.postOrderNew', 'uses' => 'OrderController@postOrderNew']);
		Route::get('update', ['as' => 'admin.order.update', 'uses' => 'OrderController@update']);
		Route::get('order-read/{id}', ['as' => 'admin.order.read', 'uses' => 'OrderController@orderRead'])->where(['id' => '[0-9]+']);
	});

	/**
	* 	Contact manage in admin
	*/
	Route::group(['prefix' => 'contact'], function () {
		Route::get('list/{seach?}', ['as' => 'admin.contact.getList', 'uses' => 'ContactController@getList']);
		Route::post('list/{seach?}', ['as' => 'admin.contact.postList', 'uses' => 'ContactController@postList']);
		Route::get('read/{id}', ['as' => 'admin.contact.read', 'uses' => 'ContactController@read'])->where(['id' => '[0-9]+']);
	});

	/**
	*	Blog manage: All new in website
	*/
	Route::group(['prefix' => 'blog'], function () {
		Route::get('add', ['as' => 'admin.blog.getAdd', 'uses' => 'BlogController@getAdd']);
		Route::post('add', ['as' => 'admin.blog.postAdd', 'uses' => 'BlogController@postAdd']);
		Route::get('list/{seach?}', ['as' => 'admin.blog.getList', 'uses' => 'BlogController@getList']);
		Route::post('list/{seach?}', ['as' => 'admin.blog.postList', 'uses' => 'BlogController@postList']);
		Route::get('delete/{id}/{seach?}', ['as' => 'admin.blog.getDelete', 'uses' => 'BlogController@getDelete'])->where(['id' => '[0-9]+']);
		Route::get('edit/{id}', ['as' => 'admin.blog.getEdit', 'uses' => 'BlogController@getEdit'])->where(['id' => '[0-9]+']);
		Route::post('edit/{id}', ['as' => 'admin.blog.postEdit', 'uses' => 'BlogController@postEdit'])->where(['id' => '[0-9]+']);
	});

	/**
	*	System manage: about infomation, contact infomation , slider homepage infomation 
	*/
	Route::group(['prefix' => 'system'], function () {
		Route::get('about', ['as' => 'admin.system.getAbout', 'uses' => 'SystemController@getAbout']);
		Route::post('about', ['as' => 'admin.system.postAbout', 'uses' => 'SystemController@postAbout']);
		Route::get('contact', ['as' => 'admin.system.getContact', 'uses' => 'SystemController@getContact']);
		Route::post('contact', ['as' => 'admin.system.postContact', 'uses' => 'SystemController@postContact']);
		Route::get('slide-list', ['as' => 'admin.system.getSlideList', 'uses' => 'SystemController@getSlideList']);
		Route::get('slide-add', ['as' => 'admin.system.getSlideAdd', 'uses' => 'SystemController@getSlideAdd']);
		Route::post('slide-add', ['as' => 'admin.system.postSlideAdd', 'uses' => 'SystemController@postSlideAdd']);
		Route::get('slide-edit/{id}', ['as' => 'admin.system.getSlideEdit', 'uses' => 'SystemController@getSlideEdit'])->where(['id' => '[0-9]+']);
		Route::post('slide-edit/{id}', ['as' => 'admin.system.postSlideEdit', 'uses' => 'SystemController@postSlideEdit'])->where(['id' => '[0-9]+']);
		Route::get('slide-delete/{id}', ['as' => 'admin.system.getSlideDelete', 'uses' => 'SystemController@getSlideDelete'])->where(['id' => '[0-9]+']);
	});

	/**
	*	Upload image
	*/
	Route::group(['prefix' => 'upload'], function () {
		Route::get('list', ['as' => 'admin.upload.getList', 'uses' => 'UploadController@getList']);
		Route::post('list', ['as' => 'admin.upload.postList', 'uses' => 'UploadController@postList']);
		Route::get('add', ['as' => 'admin.upload.getAdd', 'uses' => 'UploadController@getAdd']);
		Route::post('add', ['as' => 'admin.upload.postAdd', 'uses' => 'UploadController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.upload.delete', 'uses' => 'UploadController@delete'])->where(['id' => '[0-9]+']);
		Route::get('edit/{id}', ['as' => 'admin.upload.getEdit', 'uses' => 'UploadController@getEdit'])->where(['id' => '[0-9]+']);
		Route::post('edit/{id}', ['as' => 'admin.upload.postEdit', 'uses' => 'UploadController@postEdit'])->where(['id' => '[0-9]+']);
		Route::get('upload', ['as' => 'admin.upload.upload', 'uses' => 'UploadController@upload']);
	});

	/**
	*	Category manage
	*/
	Route::group(['prefix' => 'cate'], function () {
		Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
		Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
		Route::get('list/{seach?}', ['as' => 'admin.cate.getList', 'uses' => 'CateController@getList']);
		Route::post('list/{seach?}', ['as' => 'admin.cate.postList', 'uses' => 'CateController@postList']);
		Route::get('delete/{id}/{seach?}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete'])->where(['id' => '[0-9]+']);
		Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit'])->where(['id' => '[0-9]+']);
		Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit'])->where(['id' => '[0-9]+']);
	});

	/**
	*	Product manage
	*/
	Route::group(['prefix' => 'product'], function () {

		/**
		*	Size of product manage
		*/
		Route::get('size', ['as' => 'admin.product.getSize', 'uses' => 'ProductController@getSize']);
		Route::post('size', ['as' => 'admin.product.postSizeAdd', 'uses' => 'ProductController@postSizeAdd']);
		Route::get('size-delete/{id}', ['as' => 'admin.product.getSizeDelete', 'uses' => 'ProductController@getSizeDelete'])->where(['id' => '[0-9]+']);
		Route::get('size-edit/{id}', ['as' => 'admin.product.getSizeEdit', 'uses' => 'ProductController@getSizeEdit'])->where(['id' => '[0-9]+']);
		Route::post('size-edit/{id}', ['as' => 'admin.product.postSizeEdit', 'uses' => 'ProductController@postSizeEdit'])->where(['id' => '[0-9]+']);
		
		/**
		*	Color of product manage
		*/
		Route::get('color', ['as' => 'admin.product.getColor', 'uses' => 'ProductController@getColor']);
		Route::post('color', ['as' => 'admin.product.postColorAdd', 'uses' => 'ProductController@postColorAdd']);
		Route::get('color-delete/{id}', ['as' => 'admin.product.getColorDelete', 'uses' => 'ProductController@getColorDelete'])->where(['id' => '[0-9]+']);
		Route::get('color-edit/{id}', ['as' => 'admin.product.getColorEdit', 'uses' => 'ProductController@getColorEdit'])->where(['id' => '[0-9]+']);
		Route::post('color-edit/{id}', ['as' => 'admin.product.postColorEdit', 'uses' => 'ProductController@postColorEdit'])->where(['id' => '[0-9]+']);
		
		/**
		*	Product action
		*/
		Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
		Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
		Route::get('list/{seach?}', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);
		Route::post('list/{seach?}', ['as' => 'admin.product.postList', 'uses' => 'ProductController@postList']);
		Route::get('delete/{id}/{seach?}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete'])->where(['id' => '[0-9]+']);
		Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit'])->where(['id' => '[0-9]+']);
		Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit'])->where(['id' => '[0-9]+']);
	});

	/**
	*	User manage: include super admin, admin, user
	*/
	Route::group(['prefix' => 'user'], function () {
		Route::get('list/{seach?}', ['as'  => 'admin.user.list', 'uses' => 'UserController@getList']);
		Route::post('list/{seach?}', ['as' => 'admin.user.postList', 'uses' => 'UserController@postList']);
		Route::get('add', ['as'  => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
		Route::post('add', ['as'  => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
		Route::get('delete/{id}',['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete'])->where(['id' => '[0-9]+']);
		Route::get('edit/{id}', 	['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit'])->where(['id' => '[0-9]+']);
		Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit'])->where(['id' => '[0-9]+']);
	});
});

/**
*	Authentication 
*/
Route::group(['prefix' => 'auth'], function () {
	// Authentication routes...
	Route::get('login', ['as'  => 'auth.getLogin', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('login', ['as'  => 'auth.postLogin', 'uses' => 'Auth\AuthController@postLogin']);
	Route::get('logout', ['as'  => 'auth.getLogout', 'uses' => 'Auth\AuthController@getLogout']);
	
	// Registration routes...
	Route::get('register', ['as' => 'auth.getRegister', 'uses' => 'Auth\AuthController@getRegister']);
	Route::post('register', ['as' => 'auth.postRegister', 'uses' => 'Auth\AuthController@postRegister']);

	/**
	*	Authenticate with socialite
	*/

	Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
	Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
});

/**
*	Reset password
*	
*/

// Password reset link request routes...
Route::get('password/email', [
	'as' => 'password.getEmail',
	'uses' => 'Auth\PasswordController@getEmail',	
]);
Route::post('password/email', [
	'as' => 'password.postEmail',
	'uses' => 'Auth\PasswordController@postEmail',	
]);

// Password reset routes...
Route::get('password/reset/{token}',[
	'as' => 'password.getReset',
	'uses' => 'Auth\PasswordController@getReset',	
]);
Route::post('password/reset', [
	'as' => 'password.postReset',
	'uses' => 'Auth\PasswordController@postReset',	
]);



















