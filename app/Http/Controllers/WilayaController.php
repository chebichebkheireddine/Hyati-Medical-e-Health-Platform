<?php

namespace App\Http\Controllers;

use App\Models\Wilaya;
use Illuminate\Http\Request;

class WilayaController extends Controller
{
    //
    public function index()
    {
        $wilayas = Wilaya::all();
        return response()->json($wilayas);
    }
    public function store(Request $request)
    {
        $wilaya = new Wilaya();
        $wilaya->id = $request->id;
        $wilaya->code = $request->code;
        $wilaya->name = $request->name;
        $wilaya->arabic_name = $request->ar_name;
        $wilaya->longitude = $request->longitude;
        $wilaya->latitude = $request->latitude;
        $wilaya->save();
        return response()->json($wilaya);
    }
}
