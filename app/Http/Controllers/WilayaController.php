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
        $locationsData = $request->all();

        foreach ($locationsData as $locationData) {
            $wilaya = new Wilaya();
            $wilaya->code = $locationData['code'];
            $wilaya->name = $locationData['name'];
            $wilaya->arabic_name = $locationData['ar_name'];
            $wilaya->longitude = $locationData['longitude'];
            $wilaya->latitude = $locationData['latitude'];
            $wilaya->save();
        }

        return response()->json('Wilayas created successfully', 201);
    }
}
