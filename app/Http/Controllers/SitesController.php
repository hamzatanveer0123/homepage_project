<?php

namespace App\Http\Controllers;

use Auth;
use App\Site;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        if (Auth::check())
        {
            $sites = Auth::user()->sites;
            $notes = Auth::user()->notes;

        }
        return view('sites.index', compact('sites', 'notes'));
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

        $site = new Site;
        $site->name = $request->name;
        $site->url = $request->url;
        $site->image = $request->image;
        $user->sites()->save($site);

        return redirect('/');
    }

    function delete(Site $site) {
        $site->delete();
        return redirect('/');
    }

}
