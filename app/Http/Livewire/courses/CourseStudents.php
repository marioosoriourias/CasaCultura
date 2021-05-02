<?php

namespace App\Http\Livewire\courses;;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class CourseStudents extends Component
{

    use WithPagination;
    public $search;
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $students = Course::find($this->course->id)->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.courses.course-students', compact('students'));
    }
    
    public function limpiar_page(){
        $this->reset('page');
    }
}
