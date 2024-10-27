<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
  public function index()
  {
    return view('establishments.index');
  }

  public function show(Establishment $establishment)
  {
    $establishment->load(['owner', 'offerings', 'galleries']);
    return view('establishments.show', compact('establishment'));
  }

  public function create()
  {
    $users = User::get();
    $businessTypes = BusinessType::all();
    return view('establishments.create', compact('businessTypes', 'users'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'establishment_owner' => 'required',
      'establishment_name' => 'required',
      'establishment_description' => 'required',
      'establishment_address' => 'required',
      'establishment_contact_number' => 'required',
      'establishment_mode_of_access' => 'required',
      'establishment_type_of_business' => 'required'
    ]);


    Establishment::create([
      'user_id' => $request->establishment_owner,
      'name' => $request->establishment_name,
      'description' => $request->establishment_description,
      'address' => $request->establishment_address,
      'geolocation_longitude' => $request->establishment_geolocation_longitude,
      'geolocation_latitude' => $request->establishment_geolocation_latitude,
      'mode_of_access' => implode(', ', $request->establishment_mode_of_access),
      'contact_number' => $request->establishment_contact_number,
      'business_type_id' => $request->establishment_type_of_business
    ]);

    return redirect(route('establishments.index'));
  }

  public function edit(Establishment $establishment)
  {
    $businessTypes = BusinessType::all();
    $users = User::get();
    return view('establishments.edit', compact('establishment', 'businessTypes', 'users'));
  }

  public function update(Request $request, Establishment $establishment)
  {
    $request->validate([
      'establishment_owner' => 'required',
      'establishment_name' => 'required',
      'establishment_description' => 'required',
      'establishment_address' => 'required',
      'establishment_contact_number' => 'required',
      'establishment_mode_of_access' => 'required',
      'establishment_type_of_business' => 'required'
    ]);

    $establishment->update([
      'user_id' => $request->establishment_owner,
      'name' => $request->establishment_name,
      'description' => $request->establishment_description,
      'address' => $request->establishment_address,
      'geolocation_longitude' => $request->establishment_geolocation_longitude,
      'geolocation_latitude' => $request->establishment_geolocation_latitude,
      'mode_of_access' => implode(', ', $request->establishment_mode_of_access),
      'contact_number' => $request->establishment_contact_number,
      'business_type_id' => $request->establishment_type_of_business
    ]);

    return redirect(route('establishments.index'));
  }
}
