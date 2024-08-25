<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $name,
        public $description,
        public $urlPath,
        public $imagePath = '',
        public $rating = 0
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-card');
    }
}
