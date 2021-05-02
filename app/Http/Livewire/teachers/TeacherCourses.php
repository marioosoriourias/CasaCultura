<?php

namespace App\Http\Livewire\teachers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;

class TeacherCourses extends Component
{

    use WithPagination;
    public $search;

    public $course;
    public $teacher;

    public function mount(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function render()
    {
        $teacher = Teacher::find($this->teacher->id);
        $courses = Teacher::find($this->teacher->id)->courses()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.teachers.teacher-courses',  compact('courses', 'teacher'));
    }


    public function limpiar_page(){
        $this->reset('page');
    }

}
