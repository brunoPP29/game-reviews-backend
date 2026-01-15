<?php

namespace App\Http\Services;
use App\Models\Favorites;
use Illuminate\Support\Facades\Auth;

class FavoritesService{

    public function create($id_game){
        try {
            return Favorites::create([
                'id_game' => $id_game,
                'user_id' => Auth::id(),
            ]);
        } catch (\Exception $e) {
            return false;
        }

    }


    public function getFavoritesById($userId){
        return Favorites::where('user_id', $userId)
                       ->get();
    }


    public function destroy($id_game){
        $deleted = Favorites::where('id_game', $id_game)
                            ->where('user_id', Auth::id())
                            ->delete();
        return $deleted > 0;
        
    }

    public function itsFavorite($id_game, $userId){
        try {
            $favorite = Favorites::where('id_game', $id_game)
                ->where('user_id', $userId)
                ->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return false;
        }

    }

}