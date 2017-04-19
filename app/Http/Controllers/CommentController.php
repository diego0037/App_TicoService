<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        $response = [
            'comments' => $comments
        ];
        return response()->json($response,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
      $comment = new Comment();
      $comment->id_user_comm = $user->id;
      $comment->id_user_collab = $request->coll_id;
      $comment->comment = $request->comment;
      $comment->save();
      return redirect()->action(
        'CollaboratorController@show', ['id' => $request->coll_id]
      )->with('status', 'Comentario Realizado!');

      // $this->validate($request, [
      //     'comment' => 'required',
      // ]);
        // $user_comm = JWTAuth::parseToken()->toUser();
        // //$user = User::find($request->input('id_user_comm'));
        // $id_receive = $request->input('id_collab');
        //
        // if(!$user_comm || !$id_receive){
        //     return response()->json(['message' => 'Error en registro de comentario'], 404);
        // }
        //
        // $comment = new Comment();
        // $comment->comment = $request->input('comment');
        // $comment->id_user_comm = $user_comm->id;
        // $comment->id_user_collab = $request->input('id_collab');
        // $comment->save();
        // return response()->json(['comment' => $comment], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json(['message' => 'Comentario no existente'], 404);
        }
        return response()->json($comment,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->toUser();
        $comment = Comment::where('id_user_comm', $user->id)->first();
        if(!$comment->id_user_comm)
        {
            return response()->json(['message' => 'Comentario no existente'], 404);
        }

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment->comment = $request['comment'];
        $comment->save();
        return response()->json(['comment' => $comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['message' => 'Comentario eliminado']);
    }
}
