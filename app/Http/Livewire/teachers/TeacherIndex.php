<?php

namespace App\Http\Livewire\teachers;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherIndex extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {
        $teachers = Teacher::where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.teachers.teacher-index', compact('teachers'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}
