<?php

namespace App\Livewire\Matriculas;

use Livewire\Component;

class Create extends Component
{
    public $matricula;

    public function guardarMatricula() {
        dd($this->matricula);
    }

    public function render()
    {
        return view('livewire.matriculas.create');
    }
}
