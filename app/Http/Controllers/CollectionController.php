<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collection;

class CollectionController extends Controller
{
    public function index(Request $request, $username)
    {
        return view("collec-index");
    }

    public function getCollection(Request $request, $username)
    {
        $category = "played";
        if ($request->has("category")) {
            $category = $request->category;
        }


        $c = Collection::where("category", $category)
                ->where("user.username", $username)
                ->with("preference")
                ->first();

        return response()->json([
            "data" => $c,
            "success" => isset($c)
        ]);
    }
}
