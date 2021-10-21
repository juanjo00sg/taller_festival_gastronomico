<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRestaurantResquest;

class RestaurantControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $restaurants = Restaurant::owned(Auth::id())->orderBy('name', 'asc')->get();

        return $restaurants=Restaurant::all();
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $restaurant = new Restaurant();
        $restaurant->fill($input);
        $restaurant->save();

        return $restaurant;
        //
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
    public function update(Request $request, $id)
    {
        //
        
        dd($request);
        $input = $request->all();
        
        $restaurant = new Restaurant();
        $restaurant->fill($input);
        
       $res = $restaurant->save();
        return $res;
        if ($res) {
            return response()->json(['message' => 'Institute update succesfully']);
        }

        return response()->json(['message' => 'Error to update Institute'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurant::destroy($id);
        //
    }
}
