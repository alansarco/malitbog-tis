<?php

namespace App\Livewire;

use App\Models\Establishment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Destinations extends Component
{
    public $establishments;
    public $userType = 'guest';
    public $searchItem;

    public function render()
    {
        return view('livewire.destinations')
            ->extends('layouts.app');
    }

    public function booted()
    {
        $this->getEstablishment();
    }

    public function updatedSearchItem()
    {
        // $this->getEstablishment();
        if (!empty($this->searchItem)) {
            // $this->establishments = $this->establishments->where('name', 'LIKE', "%$$this->searchItem%");
            // dd($this->establishments->where('name', 'LIKE', `%{$this->searchItem}%`));

            $this->establishments = Establishment::with([
                'reviews',
                'images' => function ($query) {
                    $query->where('is_cover', true);
                }
            ])
            ->where('name', 'LIKE', "%$this->searchItem%")->get();
        }
    }

    private function getEstablishment()
    {
        switch ($this->userType) {
            case 'owner':
                $this->establishments = Establishment::where('owner_id', 2)->with([
                    'reviews',
                    'images' => function ($query) {
                        $query->where('is_cover', true);
                    }
                ])->get();
                break;

            default:
                $this->establishments = Establishment::with([
                    'reviews',
                    'images' => function ($query) {
                        $query->where('is_cover', true);
                    }
                ])->get();
                break;
        }
    }
}
