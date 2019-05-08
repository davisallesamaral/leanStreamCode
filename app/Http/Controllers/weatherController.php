<?php namespace leanStreamTest\Http\Controllers;
use Illuminate\Support\Facades\DB;
use leanStreamTest\Weather;


class weatherController  extends Controller {

    public function list(){
        $weathers = Weather::all();
        return  view('weather.list')->with('weathers', $weathers);
    }

    public function listCity($city){
        $matchThese = ['city' => $city];
        $weathers = Weather::where($matchThese)->get();

        return  view('weather.list')->with('weathers', $weathers);
    }

}