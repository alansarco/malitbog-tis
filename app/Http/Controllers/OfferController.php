<?php

namespace App\Http\Controllers;

use App\Models\Offering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
  public function index()
  {
    return view('owners.offers.index');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required',
    ]);

    $offer = Offering::create([
      'establishment_id' => auth()->user()->establishment->id,
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price
    ]);

    if ($request->has('image')) {
      $path = Storage::put('/public/offers', $request->file);
      $offer->update(['path' => $path]);
    }

    return redirect(route('owners.establishment-offers'));
  }
}
