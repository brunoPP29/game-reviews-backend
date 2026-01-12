<?php

namespace App\Http\Services;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewGameService{

    public function create($request){
        try {
            return Review::create([
                'id_game' => $request->get('idGame'),
                'title'   => $request->get('title'),
                'score'   => $request->get('score'),
                'text'    => $request->get('text'),
                'user'    => Auth::id(),
            ]);
        } catch (\Exception $e) {
            return false;
        }

    }


    public function getReviewsById($userId){
        return Review::where('user', $userId)
                ->get();
    }

}