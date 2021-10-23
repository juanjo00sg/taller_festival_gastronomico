<?php

namespace App\Http\Controllers\api\v1;

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
        $authUser = Auth::user();
        if (!$authUser->tokenCan('user:index')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }  

        $res = Restaurant::all();
        if ($res) {
            return response()->json(['message' => 'Restaurantes obtenidos con éxito','data' => $res], 200);
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
    public function store(StoreRestaurantResquest $request)
    {

        if (!$request->user()->tokenCan('restaurant:store')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        $input = $request->all();

        $restaurant = new Restaurant();
        $restaurant->fill($input);
        $restaurant->save();


        if ($restaurant) {
            return response()->json(['message' => 'Restaurante creado con éxito'], 200);
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
        $authUser = Auth::user();
        if (!$authUser->tokenCan('user:index')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            return $restaurant;
        }
        return response()->json(['message' => 'Restaurante NO encontrado en el registro'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantResquest $request, $id)
    {        
        if (!$request->user()->tokenCan('restauranr:update')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $input = $request->all();

        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return response()->json(['message' => 'Restaurante NO encontrado en el registro'], 404);
        }

        $restaurant->fill($input);

        $res = $restaurant->save();

        if ($res) {
            return response()->json(['message' => 'Restaurante actualizado'], 200);
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
        $authUser = Auth::user();
        if (!$authUser->tokenCan('user:index')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        if (Restaurant::destroy($id)) {
            return response()->json(['message' => 'Restaurante eliminado'], 200);
        }
        return response()->json(['message' => 'Restaurante no encontrado en el registro'], 404);
    }
}
