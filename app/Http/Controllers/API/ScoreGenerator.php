<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Generator;
use Carbon\Carbon;

class ScoreGenerator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generate = new Generator();

        $this->validate($request, [
            'from' => 'required|numeric',
            'to' => 'required|numeric'
        ]);

        $generate->from = $request->input('from');
        $generate->to = $request->input('to');
        $generate->score = rand($request->input('from'), $request->input('to'));

        $generate->save();

        return view('result')->with('generate', $generate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function result() {
        $scores = Generator::latest('created_at')->first();
        return view('result')->with('scores', $scores);
        // return $scores;
    }

    public function day() {
        $test = Generator::selectRaw("count('id') as total, score")
        ->groupBy('score')
        ->whereDate('created_at', Carbon::today())
        ->get();
        // $test = Generator::whereDate('created_at', Carbon::today())->get();
        return $test;
    }
}
