<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator

class UsersController extends Controller
{

    public function showAllUsers()
    {
        return response()->json(User::all());
    }

    public function showOneUsers($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->validate($request->all())) {
                $user->fill($request->all());

                // save
                $user->save();
            } else {
                return response()->json($user->errors(), 422);
            }
        } catch (Exception $e) {
            return response()->json($e, 422);
        }

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}