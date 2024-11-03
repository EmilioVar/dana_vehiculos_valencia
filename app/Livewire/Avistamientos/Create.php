<?php

namespace App\Livewire\Avistamientos;

use App\Models\Avistamiento;
use Livewire\Component;
use Livewire\Attributes\On;

class Create extends Component
{
    public $lat;
    public $lon;
    public $matricula;
    public $status;
    public $observaciones;
    public $matriculaCargada = false;

    #[On('geolocation')]
    public function setGeolocation($lat, $lon) {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function guardarMatriculaAvistamiento() {
        Avistamiento::create([
            'matricula' => strtoupper($this->matricula),
            'lat' => $this->lat,
            'lon' => $this->lon,
            'status' => $this->status,
            'observaciones' => $this->observaciones
        ]);

        $this->matriculaCargada = true;
    }
    public function render()
    {
        return view('livewire.avistamientos.create');
    }
}
