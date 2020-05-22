<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->input('username'))->first();
        if (Hash::check($request->input('password'), $user->password)) {

            User::where('username', $request->input('username'))->select('nick');
            return response()->json($user, 201);
        } else {
            return response()->json(401);
        }
    }

    public function showAllUsers()
    {
        $users = User::query()
                    ->orderBy('id')
                    ->get();

        return response()->json($users);
    }

    public function showOneUsers($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'nick' => 'required',
            'email' => 'required',
            'number' => 'required',
            'password' => 'required'
        ]);

        if ($user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'nick' => $request->get('nick'),
            'email' => $request->get('email'),
            'number' => $request->get('number'),
            'password' => Hash::make($request->get('password'))
        ])
        ) {
            return response()->json($user, 201);
        } else {
            return response()->json(['status' => 'fail']);
        }

    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy(Request $request)
    {
        User::destroy($request->id);

        return redirect()->route('listar_perfis');
    }
}
