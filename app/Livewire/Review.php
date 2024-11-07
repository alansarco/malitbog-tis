<?php

namespace App\Livewire;

use App\Models\Review as ModelsReview;
use Livewire\Component;

class Review extends Component
{
  public $establishmentId;

  public $reviews;

  public $name;
  public $rate;
  public $description;

  public function saveEvent()
  {
    $this->validate([
      'name' => 'required',
      'description' => 'required',
      'rate' => 'required',
    ]);

    ModelsReview::create([
      'establishment_id' => $this->establishmentId,
      'name' => $this->name,
      'description' => $this->description,
      'rate' => $this->rate,
    ]);

    $this->setReviews();

    $this->name = '';
    $this->rate = '';
    $this->description = '';
  }

  public function setReviews()
  {
    $this->reviews = ModelsReview::where('establishment_id', $this->establishmentId)->get();
  }

  public function mount()
  {
    $this->setReviews();
  }

  public function render()
  {
    return view('livewire.review');
  }
}
