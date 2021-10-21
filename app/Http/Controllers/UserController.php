<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        //return view('users.index', compact('users'));
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.'); 

            return redirect(route('home'));
        }        

        return view("users.create"); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        /* if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
        {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.'); 

            return redirect(route('home'));
        } */

        $input = $request->all();        
                
        $user = new User();
        $user->fill($input);
        
        $user->password=Hash::make($input['password']);
                
        $user->save();

        

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $usuario->find($user);
       // return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       // return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $input = $request->all();

        $user-> fill($input);
        $user->password=Hash::make($input['password']);
        $user->save();

        
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->sendResponse(
            $user,
            'Usuario eliminado'
        );
    }
}
