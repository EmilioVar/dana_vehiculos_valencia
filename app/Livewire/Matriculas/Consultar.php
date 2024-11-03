<?php

namespace App\Livewire\Matriculas;

use App\Models\Avistamiento;
use Livewire\Component;
use App\Models\Matricula;

class Consultar extends Component
{
    public $result;
    public $matricula;
    public $lat;
    public $lon;
    public $status;
    public $personas;
    public $observaciones;
    public $notFound = false;

    public function consultarMatricula() {
        $matricula = Avistamiento::where('matricula', $this->matricula)->first();

        if($matricula) {
            $this->result = true;
            $this->notFound = false;
            $this->lat = $matricula?->lat;
            $this->lon = $matricula?->lon;
            $this->status = $matricula->status;
            $this->personas = $matricula->personas;
            $this->observaciones = $matricula?->observaciones;
        } else {
            $this->result = false;
            $this->notFound = true;
            $this->lat = null;
            $this->lon = null;
            $this->status = null;
            $this->personas = null;
            $this->observaciones = null;
        }
    }
    public function render()
    {
        return view('livewire.matriculas.consultar');
    }
}
