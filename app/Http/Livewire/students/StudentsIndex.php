<?php

namespace App\Http\Livewire\students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsIndex extends Component
{

    use WithPagination;
    public $search;


    public function render()
    {
        $students = Student::where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.students.students-index', compact('students'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
