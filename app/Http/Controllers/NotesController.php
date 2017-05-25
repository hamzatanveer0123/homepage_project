<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Note;

use App\Http\Requests;

class NotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function store(Request $request, User $user){
//        $validator = Validator::make($request->all(), [
//            'body' => 'required|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }

        $note = new Note;
        $note->body = $request->body;
        $user->notes()->save($note);

        return redirect('/');
    }}
