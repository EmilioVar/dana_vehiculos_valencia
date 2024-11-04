<?php

namespace App\Livewire\Avistamientos;

use Livewire\Component;
use App\Models\Matricula;
use Livewire\Attributes\On;
use App\Models\Avistamiento;
use Illuminate\Validation\Rule;
use App\Mail\VehiculoEncontrado;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    public $lat;
    public $lon;
    #[Validate]
    public $matricula;
    public $buscado = false;
    public $buscadoTienePersonas = false;
    #[Validate]
    public $status;
    public $personas = false;
    public $observaciones;
    public $matriculaCargada = false;

    public function rules()
    {
        return [
            'matricula' => ['required', Rule::unique('avistamientos')],
            'status' => ['required'],
        ];
    }

    protected $messages = [
        'matricula.required' => 'El campo matricula es requerido.',
        'email.required' => 'El campo email es requerido.',
        'email.unique' => 'El email ya se encuentra registrado.',
        'matricula.unique' => 'La matricula ya se encuentra registrada.',
    ];

    public function updated($property)
    {
        if ($property === 'matricula') {
            $matriculaEnBusca = Matricula::where('matricula', $this->matricula)->first();

            if ($matriculaEnBusca) {
                $this->buscado = true;
                $this->buscadoTienePersonas = $matriculaEnBusca->personas;
            } else {
                $this->buscado = false;
                $this->buscadoTienePersonas = false;
            }
        }
    }

    #[On('geolocation')]
    public function setGeolocation($lat, $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function guardarMatriculaAvistamiento()
    {
        $this->validate();

        $avistamiento = Avistamiento::create([
            'matricula' => strtoupper($this->matricula),
            'lat' => $this->lat,
            'lon' => $this->lon,
            'status' => $this->status,
            'personas' => $this->personas,
            'observaciones' => $this->observaciones,
        ]);

        $matriculaEnBusca = Matricula::where('matricula', $this->matricula)->first();

        /* if ($matriculaEnBusca) {
            Mail::to($matriculaEnBusca->email)->queue(new VehiculoEncontrado($avistamiento));
        } */

        $this->matriculaCargada = true;
    }
    public function render()
    {
        return view('livewire.avistamientos.create');
    }
}
