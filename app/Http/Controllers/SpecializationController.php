<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    // This is the controller for the Specialization model
    public function delete(Specialization $specialization)
    {
        // This function will delete the specialization
        $specialization->delete();
        return redirect(Route('admin.doctor.index'));
    }
}