<?php

namespace App\Livewire;

use App\Models\Establishment;
use Livewire\Component;

class EstablishmentInformation extends Component
{
    public $establishment;

    public function render()
    {
        return view('livewire.establishment-information')
            ->extends('layouts.app');
    }

    public function mount(Establishment $establishment)
    {
        $this->establishment = $establishment->load(['reviews', 'images']);
    }
}
