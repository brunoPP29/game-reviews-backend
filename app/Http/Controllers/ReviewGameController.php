<?php

namespace App\Http\Controllers;

use App\Http\Services\ReviewGameService;
use Illuminate\Http\Request;

class ReviewGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req){
        $idGame = $req->id;
        return view('reviewPage', compact('idGame'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req, ReviewGameService $service)
    {
        //criar record de review unico para id do game
        $recordReview = $service->create($req->request);
        if ($recordReview === false) {
            return back()->with('error', 'Erro ao salvar a review.');
            }
            //->route('showReviews')
            return back()->with('success', 'Review salva com sucesso.');
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
