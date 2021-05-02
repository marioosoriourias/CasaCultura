<?php

namespace App\Http\Livewire\periods;

use App\Models\Period;
use Livewire\Component;
use Livewire\WithPagination;


class PeriodIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {  
        $periods = Period::where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.periods.period-index', compact('periods'));
    }

    
    public function limpiar_page(){
        $this->reset('page');
    }

}
