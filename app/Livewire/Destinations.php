<?php

namespace App\Livewire;

use App\CategoryEnum;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Destinations extends Component
{
    public $establishments;
    public $categories;
    public $userType = 'guest';

    // Use for filtering
    public $searchItem;
    public $filterRate;
    public $filterCategory;

    public function render()
    {
        return view('livewire.destinations')
            ->extends('layouts.app');
    }

    public function booted()
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

        $this->categories = CategoryEnum::cases();
    }

    public function updated()
    {
        $this->establishments = Establishment::with([
            'reviews',
            'images' => function ($query) {
                $query->where('is_cover', true);
            }
        ])
            ->when(!empty($this->searchItem), function ($query) {
                $query->where('name', 'LIKE', "%{$this->searchItem}%");
            })
            ->when(!empty($this->filterCategory), function ($query) {
                $query->where('category', $this->filterCategory);
            })
            ->when(!empty($this->filterRate), function ($query) {
                $query->join('reviews', 'establishments.id', '=', 'reviews.establishment_id')
                    ->whereNull('reviews.deleted_at')
                    ->groupBy('establishments.id')
                    ->havingRaw('AVG(reviews.rate) >= ?', [$this->filterRate]);
            })
            ->when(!empty($this->filterRate), function ($query) {
                $query->selectRaw('establishments.*, AVG(reviews.rate) as avg_rate');
            })
            ->groupBy('establishments.id')
            ->get();
    }
}
