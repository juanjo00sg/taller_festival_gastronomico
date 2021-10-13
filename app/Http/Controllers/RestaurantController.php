<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRestaurantResquest;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::owned(Auth::id())->orderBy('name', 'asc')->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'admin' & Auth::user()->type != 'owner') {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.');

            return redirect(route('home'));
        }

        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view("restaurants.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type != 'admin' & Auth::user()->type != 'owner') {
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.');

            return redirect(route('home'));
        }
        
        $input = $request->all();
        
        $restaurant = new Restaurant();
        $restaurant->fill($input);
        $restaurant->user_id = Auth::id();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = Carbon::now();
            $filename = $filename->format('Y_m_d_His'). '.' . $extension;
            $file->move('images/restaurants', $filename);
            $restaurant->logo = $filename;            
        } else {
            
            $filename = 'restaurant.png';
            $restaurant->logo = $filename;            
        }

        $restaurant->save();

        Session::flash('success', 'Restaurante agregado exitosamente');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view("restaurants.edit", compact('categories', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantResquest $request, Restaurant $restaurant)
    {
        $input = $request->all();

        $restaurant->fill($input);
        $restaurant->user_id = Auth::id();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = Carbon::now();
            $filename = $filename->format('Y_m_d_His').'_'.$restaurant->id. '.' . $extension;
            $file->move('images/restaurants', $filename);
            $restaurant->logo = $filename;            
        } else {
            
            $filename = 'restaurant.png';
            $restaurant->logo = $filename;            
        }

        $restaurant->save();

        Session::flash('success', 'Restaurante editado exitosamente');

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        Session::flash('success', 'Restaurante removido exitosamente');

        return redirect(route('restaurants.index'));
    }

    /////////////////////////////////////////////////////

    public function showFrontPage(Request $request)
    {
        $filter = $request['filter'] ?? null;

        if (!isset($request['filter']))
            $restaurants = Restaurant::orderBy('name', 'asc')->paginate(8);
        else {
            $restaurants = Restaurant::orderBy('name', 'asc')->where('category_id', '=', $request['filter'])->paginate(8);
            $restaurants->appends(['filter' => $filter]);
        }

        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view('front_page.index', compact('restaurants', 'categories', 'filter'));
    }
}
