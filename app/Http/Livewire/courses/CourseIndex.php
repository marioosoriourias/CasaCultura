<?php

namespace App\Http\Livewire\courses;

use App\Models\Course;
use App\Models\Period;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {
        $periods = Period::all();
        $courses = Course::where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.courses.course-index', compact('courses', 'periods'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }
}
