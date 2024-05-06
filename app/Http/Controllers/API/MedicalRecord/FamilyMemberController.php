<?php

namespace App\Http\Controllers\API\MedicalRecord;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecords\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function createFamilyMember($patientid, $typeMember)
    {
        //
        $createFamilyMember = FamilyMember::create([
            'patientId' => $patientid,
            'memberType' => $typeMember,
            'memberHealthId' => 0,
            // TODO make the memberHealthId dynamic

        ]);
        return response()->json($createFamilyMember);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Show family members with normal for patient 
    public function show($id)
    {
    }
    public function showFamily($id)
    {

        $familyMembers = FamilyMember::Where('patientId', $id)->get();
        $familyPatient = $familyMembers->map(function ($familyMember) {
            return $familyMember->family;
        });


        return response()->json($familyPatient);
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
    }
}
