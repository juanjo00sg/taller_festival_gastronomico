<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{

    public function store($id, Request $request)
    {
        
            $input = $request->all();
            
            $comment= new Comment();
            $comment->fill($input);
            $comment->user_id = Auth::id();
            $comment->restaurant_id=$id;
            $comment->save();
            //return $comment;
            if ($comment) {
                return response()->json(['message' => 'Comentario guardado con éxito'], $comments);
            }
    
            return response()->json(['message' => 'Error guardando el comentario'], 500);
            /* Session::flash('success', 'Comentario agregado exitosamente'); 
            return redirect(route('home')); */
        //
    }

    public function show($id)
    {
     
         $comments =Comment::where('restaurant_id', $id)->get();  
         if ($comments) {
            return response()->json(['message' => 'Commentario encontrado'], $comments);
        }

        return response()->json(['message' => 'No se encontraron comentarios'], 404);
         
         /* dd($comments); */
            //return view('comments.show', compact('comments') );
        
    }
   
    public function destroy($id)
    {
        Restaurant::destroy($id);
      

        return response()->json(['message' => 'Commentario eliminado'], 200);
        //
    }
}
