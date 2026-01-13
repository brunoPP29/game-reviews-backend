<?php

namespace App\Http\Controllers;

use App\Http\Services\ReviewGameService;
use App\Http\Services\SingleGameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req, SingleGameService $SingleGameService){
        $idGame = $req->id;
        $gameName = $SingleGameService->getGameName($idGame);

        return view('reviewPage', compact('idGame', 'gameName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req, ReviewGameService $service)
    {
        //criar record de review unico para id do game
        $recordReview = $service->create($req->request);
        if ($recordReview === false) {
            return back()
            ->with('error', 'Erro ao salvar a review.');
            }
            return redirect()
            ->route('showReviews')
            ->with('success', 'Review salva com sucesso.');
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
    public function show(
    ReviewGameService $service,
    SingleGameService $SingleGameService,
    $user = null
    )
    {
    // se não vier id na URL, usa o usuário logado
    $userId = $user ?? Auth::id();

    // pega o usuário dono das reviews
    $userModel = \App\Models\User::findOrFail($userId);

    // pega as reviews desse usuário
    $reviews = $service->getReviewsById($userId);

    $reviewsNameGame = collect();

    foreach ($reviews as $review) {
        $gameName = $SingleGameService->getGameName($review->id_game);

        $reviewsNameGame->push([
            'game_name' => $gameName,
            'user_name' => $userModel->name,
            'id'        => $review->id,
            'id_game'   => $review->id_game,
            'title'     => $review->title,
            'score'     => $review->score,
            'text'      => $review->text,
        ]);
    }
    return view('showReviews', compact('reviewsNameGame'));

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
    public function delete(string $id, ReviewGameService $ReviewService)
    {
        $delete = $ReviewService->delete($id);
        if ($delete === true) {
            return back()->with('success', 'Review salva com sucesso.');

        }else{
            return back()->with('error', 'Algo deu errado ao tentar deletar review');
        }
    }
}
