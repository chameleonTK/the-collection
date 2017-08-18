<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function getUser(Request $request, $id)
    {
        $u = User::find($id);
        return response()->json([
            "data" => $u,
            "success" => isset($u)
        ]);
    }

    public function getUserByUsername(Request $request, $username)
    {

        $u = User::where("username", $username)->first();
        return response()->json([
            "data" => $u,
            "success" => isset($u)
        ]);
    }
}
