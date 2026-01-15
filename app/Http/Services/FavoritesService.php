<?php

namespace App\Http\Services;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FavoriteService{

    public function create($data){
        try {
            return Review::create([
                'id_game' => $data['id_game'],
                'user_id' => Auth::id(),
            ]);
        } catch (\Exception $e) {
            return false;
        }

    }


    public function getFavoritesById($userId){
        return Review::where('user_id', $userId)
                       ->get();
    }


    public function delete($id){
        $deleted = Review::where('id', $id)
                           ->delete();
        return $deleted > 0;
        
    }

}