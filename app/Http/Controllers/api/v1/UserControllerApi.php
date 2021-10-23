<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = Auth::user();
        if (!$authUser->tokenCan('user:index')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $users = User::orderBy('id')->get();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!$request->user()->tokenCan('user:store')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        $input = $request->all();

        $user = new User();
        $user->fill($input);

        $user->password = Hash::make($input['password']);

        $user->save();



        return $user;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!$request->user()->tokenCan('user:update')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $input = $request->all();

        $user->fill($input);
        $user->password = Hash::make($input['password']);
        $user->save();


        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $authUser = Auth::user();
        if (!$authUser->tokenCan('user:destroy')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        if ($user->delete()) {
            return response()->json(['message' => 'Usuario eliminado'], 200);
        }
        return response()->json(['message' => 'Usuario no encontrado en el registro'], 404);
    }
}
