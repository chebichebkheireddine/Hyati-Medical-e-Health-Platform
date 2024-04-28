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
    public function create()
    {
        //This to create a one element

    }
    public function edit($id)
    {
        //This to edit a recourse
        $wilaya = Wilaya::find($id);
        $wilaya->code = request('code');
        $wilaya->name = request("name");
        $wilaya->arabic_name = request("ar_name");
        $wilaya->longitude = request("longitude");
        $wilaya->latitude = request("latitude");
        $wilaya->save();
        return response()->json('Wilaya:' . $id . ' has updated successfully ', 200);
    }
    public function store(Request $request)
    {
        // This line of code is custom to create multiple elements an single request
        if (!$request->has('id')) {
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
        } else {
            $wilaya = new Wilaya();
            $wilaya->id = $request->id;
            $wilaya->code = $request->code;
            $wilaya->name = $request->name;
            $wilaya->arabic_name = $request->ar_name;
            $wilaya->longitude = $request->longitude;
            $wilaya->latitude = $request->latitude;
            $wilaya->save();
        }
        return response()->json('Wilayas created successfully', 201);
    }
    public function show($id)
    {
        $wilaya = Wilaya::find($id);
        return response()->json($wilaya);
    }
    public function update(Request $request, $id)
    {
        $wilaya = Wilaya::find($id);
        $wilaya->code = $request->code;
        $wilaya->name = $request->name;
        $wilaya->arabic_name = $request->ar_name;
        $wilaya->longitude = $request->longitude;
        $wilaya->latitude = $request->latitude;
        $wilaya->save();
        return response()->json('Wilaya updated successfully', 200);
    }
    public function destroy($id)
    {
        $wilaya = Wilaya::find($id);
        $wilaya->delete();
        return response()->json('Wilaya deleted successfully', 200);
    }
}
