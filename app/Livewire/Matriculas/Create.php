<?php

namespace App\Livewire\Matriculas;

use Livewire\Component;
use App\Models\Matricula;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate]
    public $matricula;
    #[Validate]
    public $email;
    public $personas = false;
    public $matriculaCargada = false;

    public function rules()
    {
        return [
            'matricula' => [
                'required',
                Rule::unique('matriculas'), 
            ],
            'email' => [
                'required',
                'email'
            ],
            'personas' => [
                'boolean'
            ]
        ];
    }

    protected $messages = [
        'matricula.required' => 'El campo matricula es requerido.',
        'email.required' => 'El campo email es requerido.',
        'email.unique' => 'El email ya se encuentra registrado.',
        'matricula.unique' => 'La matricula ya se encuentra registrada.',
    ];

    public function updated($property) {
        $this->matricula = strtoupper($this->matricula);
        $this->email = strtoupper($this->email);
    }

    public function guardarMatricula() {
        $this->validate();

        $this->email = strtoupper($this->email);

        $this->matricula = strtoupper($this->matricula);

        Matricula::create($this->validate());

        $this->matriculaCargada = true;
    }

    public function render()
    {
        return view('livewire.matriculas.create');
    }
}
