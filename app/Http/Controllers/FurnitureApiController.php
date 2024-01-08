<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureApiController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $req)
    {
        $sku15 = $req['sku1'] . $req['sku2'] . $req['sku3'] . $req['sku4'] . $req['sku5'];

        $furniture = Furniture::where('sku', 'like', '%' . $sku15 . '%')->orderBy('sku', 'desc')->first();

        if (!$furniture) {
            $id = str_pad(1, 3, '0', STR_PAD_LEFT);
            Furniture::create(['sku' => $sku15 . $id]);
            return response()->json([
                'data' => $furniture,
            ]);
        } else {
            $id = str_pad((substr($furniture['sku'], -3) + 1), 3, '0', STR_PAD_LEFT);
            Furniture::create(['sku' => $sku15 . $id]);

            return response()->json([
                'data' => $furniture,
            ]);
        }
    }
}
