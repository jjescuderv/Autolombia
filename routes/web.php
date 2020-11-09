<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/home', 'HomeController@index')->name("home.index");
Route::get('/home/successbuy', 'HomeController@successBuy')->name("home.successbuy");

Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");

/** Routes para administrar la clase Car */
Route::get('/admin/car', 'Admin\AdminCarController@showAll')->name("admin.car.index");
Route::get('/admin/car/show/{id}', 'Admin\AdminCarController@show')->name("admin.car.show");
Route::get('/admin/car/create', 'Admin\AdminCarController@create')->name("admin.car.create");
Route::get('/admin/car/edit/{id}', 'Admin\AdminCarController@edit')->name("admin.car.edit");
Route::post('/admin/car/save', 'Admin\AdminCarController@save')->name("admin.car.save");
Route::post('/admin/car/update/{id}', 'Admin\AdminCarController@update')->name("admin.car.update");
Route::delete('/admin/car/delete/{id}', 'Admin\AdminCarController@delete')->name("admin.car.delete");

/** Routes para administrar la clase Auction */
Route::get('/admin/auction', 'Admin\AdminAuctionController@showAll')->name("admin.auction.index");
Route::get('/admin/auction/show/{id}', 'Admin\AdminAuctionController@show')->name("admin.auction.show");
Route::get('/admin/auction/create', 'Admin\AdminAuctionController@create')->name("admin.auction.create");
Route::get('/admin/auction/edit/{id}', 'Admin\AdminAuctionController@edit')->name("admin.auction.edit");
Route::post('/admin/auction/save', 'Admin\AdminAuctionController@save')->name("admin.auction.save");
Route::post('/admin/auction/update/{id}', 'Admin\AdminAuctionController@update')->name("admin.auction.update");
Route::delete('/admin/auction/delete/{id}', 'Admin\AdminAuctionController@delete')->name("admin.auction.delete");

/** Routes para los Carros, lado del cliente */
Route::get('/car', 'CarController@showAll')->name("car.index");
Route::get('/car/show/{id}', 'CarController@show')->name("car.show");
Route::post('/car/show/{id}/question', 'QuestionController@save')->name("car.question");
Route::delete('/car/delete/{id}/question', 'QuestionController@delete')->name("car.question.delete");
Route::post('/car/show/question/{id}/answer', 'Admin\AdminQuestionController@answer')->name("car.answer");

/** Routes para las Auctions, lado del cliente */
Route::get('/auction', 'AuctionController@showAll')->name("auction.index");
Route::get('/auction/show/{id}', 'AuctionController@show')->name("auction.show");
Route::post('/auction/show/{id}/bid', 'BidController@save')->name("auction.bid");

/** Routes para las Ordenes */
Route::get('/car/order{id}', 'OrderController@show')->name("order");
Route::get('/car/order/cancel', 'OrderController@cancel')->name("order.cancel");
Route::post('/car/order/save', 'OrderController@save')->name("order.save");
Route::post('/car/order/download/{id}', 'OrderController@download')->name("order.download");

/** Routes para el perfil */
Route::get('/profile/show', 'ProfileController@show')->name("profile.index");
Route::get('/serverteam', 'ServerTeamController@index')->name("serverteam.index");


Auth::routes();
