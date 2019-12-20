<?php
use Illuminate\Support\Facades\Route;
use App\Mail\BookedMovie;

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

Route::get('/', 'HomeController@welcome');

Auth::routes();

// Movies - Users
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/movie/{id}', 'MovieController@movie');
Route::get('movies/', 'MovieController@movies');
// Edit profile - Users
Route::get('/user/edit/{id}', 'HomeController@userInfo');
Route::post('/user/update', 'HomeController@userUpdate');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

});

// Reviews
Route::post('/review/add', 'ReviewController@addReview');

// Tickets
Route::get('/book/info/{id}', 'ReservationController@info');
Route::post('/book/reserve/', 'ReservationController@reserveSeats');