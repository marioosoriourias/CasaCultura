<?php

namespace App\Http\Livewire\students;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsCourses extends Component
{

    use WithPagination;
    public $search;

    public $course;
    public $student;
    public $studentId;

    public function mount(Student $student)
    {
        // $this->student = $student;
        $this->studentId = $student->id; 
    }

    public function render()
    {
        $student = Student::find($this->studentId);
        $courses = Student::find($this->studentId)->courses()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        
        return view('livewire.students.students-courses', compact('courses', 'student'));
    }


    public function delete($course)
    {
        Student::find($this->studentId)->courses()->detach($course);
        session()->flash('info', 'Curso eliminado con exito.');
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
