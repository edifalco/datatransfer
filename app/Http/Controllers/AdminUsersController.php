<?php

namespace App\Http\Controllers;

use App\Http\UsersRequests;
use App\Http\UsersEditRequests;
use App\User;
use App\Role;
use App\Photo;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Socialite;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
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
        return view('admin.users.create', compact('roles', 'providers'));
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
            'name' => 'required|max:32',
            'email' => 'required|email|unique:users'
        ]);
        
        $input = $request->all();
        
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo =  Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        
        if(isset($input['password_changed_at']) && ($input['password_changed_at'] == "on")) {
            $input['password_changed_at'] = "1980-01-01 00:00:00";
        } else {
            $input['password_changed_at'] = now();
        }
        
        Session::flash('user_created', 'The user has been created.');
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
            $input['password_changed_at'] = now();
        }
        
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo =  Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        
        if((isset($input['password_changed_at'])) && ($input['password_changed_at'] == "on")) {
            $input['password_changed_at'] = "1980-01-01 00:00:00";
        }
        
        Session::flash('user_updated', 'The user has been updated.');
        $user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->photo) {
            unlink(public_path() . $user->photo->file);
            $user->photo->delete();
        }
        $user->delete();
        Session::flash('user_deleted', 'The user has been deleted.');
        return redirect('/admin/users');
    }
    
}
