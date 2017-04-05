<?php

namespace App\Http\Controllers;

use App\Collaborator;
use App\User;
use App\Service;
use JWTAuth;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborators = Collaborator::all();
        // $response = [
        //     'collaborators' => $collaborators
        // ];
        // return response()->json($response,200);
        foreach ($collaborators as $key) {
          $user = User::find($key->id_user);
          $key->user = $user->name;
          $service = Service::find($key->id_service);
          $key->service = $service->name;
        }
        return view('PaginasWeb.colaboradores')->with('collaborators', $collaborators);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $collaborator = new Collaborator();
        $collaborator->id_user = $user->id;
        $collaborator->id_service = $request->input('id_service');
        $collaborator->description = $request->input('description');
        $collaborator->availability = $request->input('availability');
        $collaborator->save();
        return response()->json(['collaborator' => $collaborator], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collaborator = Collaborator::find($id);
        $user = User::find($collaborator->id_user);
        $service = Service::find($collaborator->id_service);
        $collaborator->name = $user->name;
        $collaborator->last_name = $user->last_name;
        $collaborator->service = $service->name;
        // if(!$collaborator){
        //     return response()->json(['message' => 'Colaborador no existente'], 404);
        // }
        // return response()->json($collaborator,200);
        return view('PaginasWeb.colaborador', ['collaborator' => $collaborator]);
        // ->with('colaborator', $collaborator);
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
        $collaborator = Collaborator::find($id);
        if(!$collaborator){
            return response()->json(['message' => 'Colaborador no existente'], 404);
        }
        $collaborator->id_user = $request->input('id_user');
        $collaborator->id_service = $request->input('id_service');
        $collaborator->description = $request->input('description');
        $collaborator->availability = $request->input('availability');
        $collaborator->save();
        return response()->json(['collaborator' => $collaborator], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->delete();
        return response()->json(['message' => 'Colaborador eliminado']);
    }
}
