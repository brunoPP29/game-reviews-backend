<?php

namespace App\Http\Services;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewGameService{

    public function create($data){
        try {
            return Review::create([
                'id_game' => $data['id_game'],
                'title'   => $data['title'],
                'score'   => $data['score'],
                'text'    => $data['text'],
                'user_id' => $data['user_id'],
            ]);
        } catch (\Exception $e) {
            return false;
        }

    }


    public function getReviewsById($userId){
        return Review::where('user_id', $userId)
                       ->get();
    }


    public function delete($id){
        $deleted = Review::where('id', $id)
                           ->delete();
        return $deleted > 0;
        
    }

}