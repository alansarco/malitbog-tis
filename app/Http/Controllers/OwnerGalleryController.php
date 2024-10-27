<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;

class OwnerGalleryController extends Controller
{
  public function index()
  {
    $establishment = Establishment::where('id', auth()->user()->establishment->id)->first();
    return view('owners.galleries.index', compact('establishment'));
  }
}
