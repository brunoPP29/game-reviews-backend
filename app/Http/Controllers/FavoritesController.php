<?php

namespace App\Http\Controllers;

use App\Http\Services\FavoritesService;
use App\Http\Services\GamesAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req, FavoritesService $service, GamesAPIService $gamesAPI)
    {
        if ($req->user !== null) {
            $user_id = $req->user;
        }else{
            $user_id = Auth::id();
        }
        $data = $service->getFavoritesById($user_id);
        //game_name
        $favorite_data = collect();

        foreach ($data as $favorited) {
            $game_name = $gamesAPI->getGameName($favorited->id_game);
            $favorite_data->push([
                'game_name' => $game_name,
                'data' => $data,
            ]);
        }
        //user_name
        $userModel = \App\Models\User::findOrFail($user_id);
        $user_name = $userModel->name;
        return view('showFavorites', compact('favorite_data', 'user_name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req, FavoritesService $service)
    {   
        $id_game = $req->id_game;
        $create = $service->create($id_game);
        if($create){
           return redirect('/game/'.$id_game);
        }else{
            return back()
            ->with('error', 'Erro ao favoritar.');
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, FavoritesService $service)
    {
        $id_game = $req->id_game;
        $destroy = $service->destroy($id_game);
        if($destroy){
           return redirect('/game/'.$id_game);
        }else{
            return back()
            ->with('error', 'Erro ao desfavoritar.');
        }
    }
}
