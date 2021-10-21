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

        $res=Restaurant::all();
        if ($res) {
            return response()->json(['message' => 'Restaurantes obtenidos con éxito'], 200);
        }

        return response()->json(['message' => 'No hay restaurantes registrados'], 404);
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

        
        if ($restaurant) {
            return response()->json(['message' => 'Restaurante creado con éxito']);
        }

        return response()->json(['message' => 'Hubo un error intentando guardar el restaurante '], 500);
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
        return Restaurant::find($id);
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
        
        $input = $request->all();
        
        $restaurant = new Restaurant();
        $restaurant->fill($input);
        
       $res = $restaurant->save();
       
        if ($res) {
            return response()->json(['message' => 'Restaurante actualizado']);
        }

        return response()->json(['message' => 'Hubo un error actualizando el restaurante'], 500);
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
      

        return response()->json(['message' => 'Restaurante eliminado'], 200);
        //
    }
}
