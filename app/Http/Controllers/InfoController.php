<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::get();
        return $infos;
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
            'title' => $request['title'],
            'description' => $request['description'],
            'state_react' => $request['reactions'],
            'state_com' => $request['comments'],
            'user_id' => $request->user()->id,
        ];

        $info = Info::create($data);

        return $info;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Info $info)
    {
        $res = $info->where('id', $info->id)
        ->with("user")
        ->with("reactions")
        ->with("comments")
        ->with("poll")
        ->first();

        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        $info->delete();

        return;
    }
}
