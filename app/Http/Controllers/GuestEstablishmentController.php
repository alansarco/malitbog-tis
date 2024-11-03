<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Establishment;
use Illuminate\Http\Request;

class GuestEstablishmentController extends Controller
{
    public function index(string $type)
    {
      $businessType = BusinessType::findOrFail($type);
      return view('destinations', compact('businessType'));
    }

    public function view(string $type, $id)
    {
      $establishment = Establishment::where('business_type_id', $type)->findOrFail($id);

      return view('desintations-info', compact('establishment'));
    }
}
