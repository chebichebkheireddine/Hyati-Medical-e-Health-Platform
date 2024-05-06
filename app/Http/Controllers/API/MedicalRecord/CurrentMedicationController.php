<?php

namespace App\Http\Controllers\API\MedicalRecord;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecords\CurrentMedication;
use App\Models\MedicalRecords\family;
use App\Models\MedicalRecords\GeneralMedicalRecord;
use Illuminate\Http\Request;

class CurrentMedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $currentMedication = CurrentMedication::Where('patientId', $id)->get();
        return response()->json($currentMedication);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // Change state of the current medication
    public function changeState($id)
    {
        $currentMedication = CurrentMedication::Where('patientId', $id)->first();
        $currentMedication->status = !$currentMedication->status;
        $currentMedication->save();
        return response()->json($currentMedication);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'drugId' => 'required',
            'dosage' => 'required',
            'frequency' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'status' => 'required',
        ]);
        $data['patientId'] = $id;
        $currentMedication = CurrentMedication::create($data);
        return response()->json($currentMedication);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $currentMedication = CurrentMedication::Where('patientId', $id)->first();
        $data = $request->validate([
            'drugId' => 'required',
            'dosage' => 'required',
            'frequency' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'status' => 'required',
        ]);
        $currentMedication->update($data);
        return response()->json($currentMedication);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $currentMedication = CurrentMedication::Where('patientId', $id)->first();
        $currentMedication->delete();
        return response()->json('Current Medication deleted successfully');
    }
}
