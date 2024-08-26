<?php

namespace App\View\Components;

use App\Models\Establishment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeatureDestinations extends Component
{
    public $establishments;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->establishments = Establishment::with([
            'reviews',
            'images' => function ($query) {
                $query->where('is_cover', true);
            }
        ])
        ->inRandomOrder()
        ->take(3)
        ->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.feature-destinations');
    }
}
