<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use App\Models\PollSubmit;
use Illuminate\Http\Request;

class PollSubmitController extends Controller
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
    public function store(Request $request, Poll $poll, PollOption $option)
    {
        $data = [
            'poll_option_id' => $option->id,
            'user_id' => $request->user()->id,
        ];

        $sameOption = $option->submits()
        ->where('user_id', $request->user()->id)
        ->where('poll_option_id', $option->id)
        ->get();

        $multiSelect = $poll->multi_select;
        $options = $poll->options()
        ->get();

        $submitCount = 0;

        foreach($options as $pollOption) {
            $count = $pollOption->submits
            ->where('user_id', $request->user()->id);

            $submitCount += count($count);
        }

        if($submitCount > 0 && $multiSelect == 'false') {
            if(count($sameOption) > 0) {
                return $data;
            }else{
                foreach($options as $pollOption) {
                    $pollOption->submits()
                    ->where('user_id', $request->user()->id)->delete();
                }
            }
        }

        if(count($sameOption) > 0) {
            $sameOption->first()->delete();
            return;
        }

        $pollSubmit = PollSubmit::create($data);

        return $pollSubmit;
    }

    /**
     * Display the specified resource.
     */
    public function show(PollSubmit $pollSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollSubmit $pollSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PollSubmit $pollSubmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollSubmit $pollSubmit)
    {
        $pollSubmit->delete();
        return;
    }
}
