<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(Request $request, $slug)
    {
        return view("collec-index");
    }

    public function getItem(Request $request, $id)
    {
        $u = Item::find($id);
        return response()->json([
            "data" => $u,
            "success" => isset($u)
        ]);
    }

    public function getItemBySlug(Request $request, $slug)
    {

        $u = Item::where("slug", $slug)->first();
        return response()->json([
            "data" => $u,
            "success" => isset($u)
        ]);
    }

    public function search(Request $request)
    {

        $u = Item::whereRaw($request->condition)->get();
        return response()->json([
            "data" => $u,
            "success" => count($u)>0
        ]);
    }
}
