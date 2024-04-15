<?php

namespace App\View\Components;

use App\Models\Specialization;
use Illuminate\View\Component;

class DataPass extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.doctor.index', ["specializations" => Specialization::all()]);
    }
}
