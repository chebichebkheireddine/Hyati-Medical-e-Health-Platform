<?php

namespace App\Http\Controllers\Specialization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    // create
    public function create()
    {
        $attrbutes = request()->validate([
            'specialization_name' => 'required|string|max:255',
            'specialization_description' => 'required|string|max:255',
        ]);
        Specialization::create($attrbutes);
        return redirect(Route('admin.doctor.index'));
    }
    // update
    public function update()
    {
    }
    //delete
    public function delete(Specialization $specialization)
    {
        // This function will delete the specialization
        $specialization->delete();
        return redirect(Route('admin.doctor.index'));
    }
}
