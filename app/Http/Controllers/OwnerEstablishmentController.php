<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerEstablishmentController extends Controller
{
  public function index()
  {
    $establishment = Auth::user()->establishment;
    return view('owners.establishments.index', compact('establishment'));
  }

  public function update(Request $request)
  {
    $request->validate([
      'establishment_name' => 'required',
      'establishment_description' => 'required',
      'establishment_address' => 'required',
      'establishment_contact_number' => 'required',
      'establishment_mode_of_access' => 'required',
    ]);


    $establishment = Auth::user()->establishment;

    $establishment->update([
      'name' => $request->establishment_name,
      'description' => $request->establishment_description,
      'address' => $request->establishment_address,
      'geolocation_longitude' => $request->establishment_geolocation_longitude,
      'geolocation_latitude' => $request->establishment_geolocation_latitude,
      'mode_of_access' => implode(', ', $request->establishment_mode_of_access),
      'contact_number' => $request->establishment_contact_number,
    ]);

    $request->session()->flash('status', 'Successfully Updated!');
    return back();
  }
}
