<?php

namespace App\Livewire\Matriculas;

use App\Models\Avistamiento;
use Livewire\Component;
use App\Models\Matricula;

class Consultar extends Component
{
    public $result;
    public $email;
    public $matriculasResult = [];
    public $lat;
    public $lon;
    public $status;
    public $personas;
    public $observaciones;
    public $notFound = false;

    public function consultarMatriculasPorEmail() {
        $matriculas = Matricula::where('email', $this->email)->pluck('matricula');

        if($matriculas->count() > 0) {
            $this->matriculasResult = Avistamiento::whereIn('matricula', $matriculas)->get();

            $this->result = true;
            $this->notFound = false;
        } else {
            $this->matriculasResult = [];
            $this->result = false;
            $this->notFound = true;
        }
    }
    public function render()
    {
        return view('livewire.matriculas.consultar');
    }
}
