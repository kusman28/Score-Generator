<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Generator;
use App\Result;
use Carbon\Carbon;
use DB;

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
        $result = rand($request->input('from'), $request->input('to'));
        $test = Generator::where('score', '=', $result)->first();
        

        if ($test === null) {

            $generate = new Generator();

            $this->validate($request, [
                'from' => 'required|numeric',
                'to' => 'required|numeric'
            ]);

            $generate->from = $request->input('from');
            $generate->to = $request->input('to');
            $generate->score = $result;
            $generate->total = 1;

            $generate->save();
        } else {
            $generate = new Generator();

            $countTotal = Generator::all()->where('score', $result)->groupBy('total');
            
            $count = ($countTotal->count() + 1);

            $this->validate($request, [
                'from' => 'required|numeric',
                'to' => 'required|numeric'
            ]);

            $generate->from = $request->input('from');
            $generate->to = $request->input('to');
            $generate->score = $result;
            $generate->total = $count;

            $generate->save();
        }

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
        // $test = \DB::table('generators')
        //     ->select('generators.*',DB::raw('COUNT(total) as count'))
        //     ->groupBy('total')
        //     ->orderBy('count')
        //     ->get();
        // $test = Generator::selectRaw("count('id') as total, score")
        // ->groupBy('score')
        // ->whereDate('created_at', Carbon::today())
        // ->get();
        // $test = Generator::whereDate('created_at', Carbon::today())->get();

        // $test = Generator::all();
        $test = Generator::all()->groupBy('total');
        return $test;
    }
}
