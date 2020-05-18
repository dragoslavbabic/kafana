<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use App\Temp;
use App\Item;
use App\User;
use Illuminate\Support\Arr;


class BillController extends Controller
{
   	public function odaberisto($id) {
   		if (Auth::user()->admin == 0) {
   			$userId = Auth::id();
      		$bills['bills'] = Temp::all();
   			$stoids = $id;
   			$items ['items'] = Item::all();
   			$ukupno = 0;
   			$temp = Temp::all();
   			foreach ($temp as $item){
   				$ukupno = $ukupno + ($item->kolicina * $item->cena);
			}
   			return view('parcijali.pravracuna',$items , $bills)->with('stoids', $stoids)->with('ukupno', $ukupno);
  		} else {
      		return view('home');
    	}
 	}

 	public function dodajutemp(Request $request, $id) {
   		if (Auth::user()->admin == 0) {
   			$konobarid = Auth::id();
   			$stoid = $id;
   			$itemid = $request->odabir;
   			$item = Item::find($itemid);
   			$naziv = $item->naziv;
   			$cena = $item->cena;
   			$bill = new Bill ([
	    		'naziv' => $naziv,
	    		'kolicina' => $request->get('kolicina'),
	    		'cena' => $cena,
	    		'konobarid' => $konobarid,
	    		'racunid' =>  $stoid,
	    		'stoid' => $stoid
    		]);
        	$bill->save();

        	$tempbill = new Temp ([
	    		'naziv' => $naziv,
	    		'kolicina' => $request->get('kolicina'),
	    		'cena' => $cena,
	    		'konobarid' => $konobarid,
	    		'racunid' =>  $stoid,
	    		'stoid' => $stoid
    		]);
    		$tempbill->save();

        	return redirect()->back();
  		} else {
      		return view('home');
    	}
     }

     public function racun_print (Request $request, User $users){
        $bills['bills'] = Temp::all();
        //dd($bills);
        $temp = Temp::all();
        $broj_stola = $temp->pluck('stoid')->first();
        $datum = $temp->pluck('created_at')->first()->format('d.m.Y.');
        $datum1 = $temp->pluck('created_at')->first()->format('d.m.Y. h:i');
		$ukupno = 0;
        //$user =  User::find($temp->pluck('konobarid')->first())->name;
        $user = Auth::user()->name;
        //$user =  User::find(1)->name;
        foreach (Temp::all() as $item){
            $ukupno = $ukupno + ($item->kolicina * $item->cena);
     }

        return view('parcijali.print',$bills)->with('datum',$datum)->with('ukupno',$ukupno)->with('stoid',$broj_stola)->with('datum1',$datum1)->with('konobar',$user);


     }
}
