<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsControllerApi extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $input = $request->all();
            
        $comment= new Comment();
        $comment->fill($input);
        $comment->user_id = Auth::id();
        $comment->restaurant_id=$id;

        $comment->save();

        if ($comment) {
            return response()->json(['message' => 'Comentario guardado con éxito'], $comment);
        }

        return response()->json(['message' => 'Error guardando el comentario'], 500);
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
    
        return response()->json(['message' => 'Commentario eliminado'], 200);
        
    }
}
