<?php

namespace App\Livewire\Avistamientos;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Avistamiento;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public $lat;
    public $lon;
    #[Validate]
    public $matricula;
    #[Validate]
    public $status;
    public $observaciones;
    public $matriculaCargada = false;

    public function rules()
    {
        return [
            'matricula' => [
                'required',
                Rule::unique('avistamientos'), 
            ],
            'status' => [
                'required',
            ]
        ];
    }
    
    #[On('geolocation')]
    public function setGeolocation($lat, $lon) {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function guardarMatriculaAvistamiento() {
        $this->validate();

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
