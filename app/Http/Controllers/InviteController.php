<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Provider;
use Illuminate\Support\Facades\Session;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites = Invite::all();
        return view('admin.invites.index', compact('invites'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.invites.create', compact('roles', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|unique:invites',
            'provider_id' => 'required',
            'role_id' => 'required',
            'is_active' => 'required'
        ]);
        
        $invite = $request->all();
        
        // validate the incoming request data
        do {
            //generate a random string using Laravel's str_random helper
            $token = str_random();
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());
        $invite['token'] = $token;
        
        //get user id that invited 
        $user = Auth::user();
        $invite['user_id'] = $user->id;
        $invite['user_name'] = $user->name;
        
        //create a new invite record
        Invite::create($invite);
        
        $email = $invite['email'];
        Mail::send('emails.invite', $invite, function($message) use ($email){
            $message->from('it@synapse-managers.com', 'Harmony Data Anonymisation Platform');
            $message->to($email,'Access to the Harmony Data Anonymisation Platform');
            $message->subject('Access to the Harmony Data Anonymisation Platform');
        });
        
        Session::flash('invite_created', 'The invite has been created.');
        return redirect('/admin/invites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invite = Invite::findOrFail($id);
        $invite->delete();
        Session::flash('invite_deleted', 'The invite has been deleted.');
        return redirect('/admin/invites');
    }
    
    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }
        return view('auth.passwords.enter_password', compact('invite'));
    }
    
    public function createuser(Request $request)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $request->token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }
        
        // create the user with the details from the invite
        $user_info = [
            'name' => $invite->name,
            'email' => $invite->email,
            'provider_id' => $invite->provider_id,
            'role_id' => $invite->role_id,
            'is_active' => $invite->is_active,
        ];
        
        //we hash the password
        $user_info['password'] = bcrypt($request->password);
        
        User::create($user_info);
        
        // delete the invite so it can't be used again
        $invite->delete();
        
        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
        Session::flash('user_created', 'Your User has been created. Enter Email & Password below.');
        return redirect('/login');
    }
}
