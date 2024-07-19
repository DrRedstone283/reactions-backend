<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Info $info)
    {
        $reactions = $info->reactions()->get();

        return $reactions;
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
        $data = [
            'emoji' => $request['emoji'],
            'info_id' => $request['info_id'],
            'user_id' => $request->user()->id,
        ];

        $sameReaction = Info::where('id', $request->info_id)
        ->first()
        ->reactions()
        ->where('user_id', $request->user()->id)
        ->where('emoji', $request->emoji)
        ->get();

        if(count($sameReaction) > 0) return;

        $reaction = Reaction::create($data);

        return $reaction;
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
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Reaction $reaction)
    {
        if($request->user()->id != $reaction->user_id) return;
        $reaction->delete();
        
        return;
    }
}
