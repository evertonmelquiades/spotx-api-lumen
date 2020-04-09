<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

class TimesController extends Controller
{

    public function showAllTimes()
    {
        return response()->json(Time::all());
    }

    public function showOneTimes($id)
    {
        return response()->json(Time::find($id));
    }

    public function create(Request $request)
    {
        $time = Time::create($request->all());

        return response()->json($time, 201);
    }

    public function update($id, Request $request)
    {
        $time = Time::findOrFail($id);
        $time->update($request->all());

        return response()->json($time, 200);
    }

    public function delete($id)
    {
        Time::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}