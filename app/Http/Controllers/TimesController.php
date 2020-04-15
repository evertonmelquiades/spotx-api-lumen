<?php

namespace App\Http\Controllers;

use App\Time;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TimesController extends Controller
{

    public function showAllTimes()
    {
        return response()->json(Time::paginate(2));
    }

    public function showOneTimes($id)
    {
        return response()->json(Time::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'password' => 'required'
        ]);

        if ($user = Time::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'password' => Hash::make($request->get('password')
            )
        ])
        ) {
            return response()->json($user, 201);
        } else {
            return response()->json(['status' => 'fail']);
        }
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