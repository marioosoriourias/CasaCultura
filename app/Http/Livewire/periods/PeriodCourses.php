<?php

namespace App\Http\Livewire\periods;

use App\Models\Period;
use Livewire\Component;
use Livewire\WithPagination;

class PeriodCourses extends Component
{

    use WithPagination;
    public $search;

    public $period;

    public function mount(Period $period)
    {
        $this->period = $period;
    }

    public function render()
    {
        $courses = Period::find($this->period->id)->courses()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.periods.period-courses', compact('courses'));
    }
    
    public function limpiar_page(){
        $this->reset('page');
    }

}
