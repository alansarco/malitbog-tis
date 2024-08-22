<?php

namespace App\Livewire;

use App\Models\Establishment as ModelsEstablishment;
use Livewire\Component;

class Establishment extends Component
{
    public $establishments;
    public $userType = 'guest';

    public function render()
    {
        return view('livewire.establishment');
    }

    public function booted()
    {
        $this->getEstablishment();
    }

    private function getEstablishment() {
        switch ($this->userType) {
            case 'owner':
                $this->establishments = ModelsEstablishment::where('owner_id', 2)->with([
                    'reviews',
                    'images' => function($query) {
                        $query->where('is_cover', true);
                    }
                ])->get();
                break;

            default:
                $this->establishments = ModelsEstablishment::with([
                    'reviews',
                    'images' => function($query) {
                        $query->where('is_cover', true);
                    }
                ])->get();
                break;
        }
    }
}
