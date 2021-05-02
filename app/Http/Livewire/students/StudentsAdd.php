<?php

namespace App\Http\Livewire\students;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsAdd extends Component
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
        $students = Course::find($this->course->id)->courses()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.students.students-add', compact('students'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
