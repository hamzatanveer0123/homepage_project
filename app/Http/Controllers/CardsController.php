<?php

namespace App\Http\Controllers;

use Auth;
use App\Card;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        if (Auth::check())
        {
            $cards = Auth::user()->cards;
            $notes = Auth::user()->notes;

        }
        return view('cards.index', compact('cards', 'notes'));
    }

    function store(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $card = new Card;
        $card->name = $request->name;
        $card->url = $request->url;
        $card->image = $request->image;
        $user->cards()->save($card);

        return redirect('/');
    }

    function delete(Card $card) {
        $card->delete();
        return redirect('/');
    }

}
