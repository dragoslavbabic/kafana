<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\User;

class ItemController extends Controller
{
    public function store(Request $request){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
    	$this->validate($request, [
    		'naziv' => 'required',
    		'cena' => 'required'
    	]);
    	$item = new Item ([
    		'naziv' => $request->get('naziv'),
    		'cena' => $request->get('cena')
    	]);
    	$item->save();
    	return redirect('/home');
    }

    public function edititem($id){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        $item = Item::where('id',$id)->get();
        return view('/parcijali.itemedit',compact('item'));
    }

    public function updateitem(Request $request, $id){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        $item = Item::where('id',$id)->first();
        $item->naziv = $request->naziv;
        $item->cena = $request->cena;
        $item->save();
        return redirect('/home');//->with('alert-success','Uspesno!');
    }

	public function deleteitem($id){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        DB::table('items')->where('id',$id)->delete();
        return redirect('/home');
    }
}
