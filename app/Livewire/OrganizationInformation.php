<?php

namespace App\Livewire;

use Livewire\Component;

class OrganizationInformation extends Component
{
    public function render()
    {
        return view('livewire.organization-information')
            ->extends('layouts.app');
    }
}
