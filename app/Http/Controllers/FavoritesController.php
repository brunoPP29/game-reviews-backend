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
    $user_id = $req->user ?? Auth::id();

    $data = $service->getFavoritesById($user_id);

    $favorite_data = collect();

    // Agrupa por jogo
    $grouped = $data->groupBy('id_game');

    foreach ($grouped as $id_game => $items) {
        $game_name = $gamesAPI->getGameName($id_game);

        $favorite_data->push([
            'game_name' => $game_name,
            'data'      => $items, // agora é só desse jogo
        ]);
    }

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
