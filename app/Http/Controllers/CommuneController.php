<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    //
    public function index()
    {
        $communes = Commune::all();
        return response()->json($communes);
    }
    public function create()
    {
        //This to create a one element

    }
    public function store(Request $request)
    {
        // This line of code is custom to create multiple elements an single request
        if (!$request->has('id')) {
            $locationsData = $request->all();
            foreach ($locationsData as $locationData) {
                $commune = new Commune();
                $commune->name = $locationData['name'];
                $commune->post_code = $locationData['post_code'];
                $commune->arabic_name = $locationData['ar_name'];
                $commune->wilaya_id = $locationData['wilaya_id'];
                $commune->longitude = $locationData['longitude'];
                $commune->latitude = $locationData['latitude'];
                $commune->save();
            }
        } else {
            $commune = new Commune();
            $commune->id = $request->id;
            $commune->name = $request->name;
            $commune->arabic_name = $request->ar_name;
            $commune->post_code = $request->post_code;
            $commune->longitude = $request->longitude;
            $commune->wilaya_id = $request->wilaya_id;
            $commune->latitude = $request->latitude;
            $commune->save();
        }
        return response()->json('Communes created successfully', 201);
    }
    public function show($id)
    {
        $commune = Commune::find($id);
        return response()->json($commune);
    }
    public function showcommun($id)
    {
        $commune = Wilaya::find($id);
        return response()->json($commune->communes);
    }
}
