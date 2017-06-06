<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Note;

class NotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function store(Request $request, User $user){
        $note = new Note;
        $note->body = $request->body;
        $user->notes()->save($note);

        return redirect('/');
    }

    function edit_notes(Request $request){

        $this->validate($request, [
            'uid' => 'required'
        ]);

//        $data = Input::all();
        if($request->ajax())
        {
            $note_entry = Note::findOrFail($request->id);
            $note_entry->id = $request->id;
            $note_entry->user_id = $request->uid;
            $note_entry->body = $request->note;
            $note_entry->update();
            return "success";
        }
        return "failed";
    }
}
