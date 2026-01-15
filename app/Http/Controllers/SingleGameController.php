<?php

namespace App\Http\Controllers;

use App\Http\Services\FavoritesService;
use App\Http\Services\GamesAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SingleGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, GamesAPIService $service, FavoritesService $favorite)
    {
        $idGame = $request->id;
        //get info games
        $gameInfos = $service->getGameInfos($idGame);
        $favorite = $favorite->itsFavorite($idGame, Auth::id());
        return view('singleGamePage', compact('gameInfos', 'favorite'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
