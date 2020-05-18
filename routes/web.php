<?php
Use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){
  Route::get('/', function () {
      if (Auth::user()->admin == 0) {
      return view('home');
    } else {
      $users['users'] = App\User::all();
      $items['items'] = App\Item::all();
      return view('adminhome', $users, $items);
    }
  });

  Route::get('/home', function() {
    if (Auth::user()->admin == 0) {
        DB::table('temps')->delete();
      return view('home');
    } else {
      $users['users'] = App\User::all();
      $items['items'] = App\Item::all();
      return view('adminhome', $users, $items);
    }
  });

  Route::get('/pazar', function() {
    if (Auth::user()->admin == 0) {
      $userId = Auth::id();
      $ukupno = 0;
      $bills['bills'] = App\Bill::all()->where('konobarid',$userId);
      $selbil = App\Bill::all()->where('konobarid',$userId);
      foreach ($selbil as $item){
          $ukupno = $ukupno + ($item->kolicina * $item->cena);
      }
      return view('parcijali.pazar',$bills)->with('ukupno',$ukupno);
    } else {
      $users['users'] = App\User::all();
      $items['items'] = App\Item::all();
      return view('adminhome', $users, $items);
    }
  });

  Route::get('/stamparacuna', function() {
    if (Auth::user()->admin == 0) {
      $userId = Auth::id();
      $bills['bills'] = App\Temp::all();
      return view('parcijali.stamparacuna',$bills);
    } else {
      $users['users'] = App\User::all();
      $items['items'] = App\Item::all();
      return view('adminhome', $users, $items);
    }
  });

  //Route::get('/racunprintaa', function() {
    //if (Auth::user()->admin == 0) {
        //$bills['bills'] = App\Temp::all();
        //$vreme=App\Temp::all()->pluck('created_at')->first();

      //return view('parcijali.print',$bills);
      //return view('parcijali.print')->with(compact('bills'));

    //} else {
      //$users['users'] = App\User::all();
      //$items['items'] = App\Item::all();
      //return view('adminhome', $users, $items);
    //}
  //});

  Route::get('/itemnew', function() {
    if (Auth::user()->admin == 1) {
      return view('parcijali.itemnew');
    } else {
      return view('home');
    }
  });

  Route::get('/usernew', function() {
    if (Auth::user()->admin == 1) {
      return view('parcijali.usernew');
    } else {
      return view('home');
    }
  });

  Route::get('/racunprint', 'BillController@racun_print');

  Route::get('/sto/{id}', 'BillController@odaberisto');

  Route::get('/deleteitem/{id}', 'ItemController@deleteitem');

  Route::get('/edititem/{id}', 'ItemController@edititem');

  Route::post('/edititem/itemupdate/{id}', 'ItemController@updateitem');

  Route::resource('/newitem', 'ItemController');

  Route::post('/newtempitem/{id}', 'BillController@dodajutemp');

  Route::resource('/newuser', 'UserController');

  Route::get('/deleteuser/{id}', 'HomeController@deleteuser');

  Route::get('/edituser/{id}', 'UserController@edituser');

  Route::post('/edituser/userupdate/{id}', 'UserController@updateuser');
});
