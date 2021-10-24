<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (!$request->user()->tokenCan('comment:store')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $input = $request->all();

        $comment = new Comment();
        $comment->fill($input);
        $comment->save();

        if ($comment) {
            return response()->json(['message' => 'Comentario guardado con éxito', 'data' => $comment], 200);
        }

        return response()->json(['message' => 'Error guardando el comentario'], 500);
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $authUser = Auth::user();
        if (!$authUser->tokenCan('comment:destroy')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        if (Comment::destroy($comment)) {
            return response()->json(['message' => 'Comentario eliminado'], 200);
        }
        return response()->json(['message' => 'Comentario no encontrado en el registro'], 404);
    }
}
