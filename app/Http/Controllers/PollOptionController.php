<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;

class PollOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Poll $poll)
    {
        $data = [
            'title' => $request['title'],
            'poll_id' => $poll->id,
        ];

        $pollOption = PollOption::create($data);

        return $pollOption;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Poll $poll, PollOption $option)
    {
        $res = $poll->options()->where('id', $option->id)->get()->first();

        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollOption $pollOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PollOption $pollOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollOption $pollOption)
    {
        //
    }
}
