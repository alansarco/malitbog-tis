<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

  public function storeOwnerWithEstablishment(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'establishment_name' => 'required|string|max:255',
                'establishment_description' => 'required|string',
                'establishment_address' => 'required|string|max:255',
                'establishment_contact_number' => 'required|string|max:20',
                'establishment_mode_of_access' => 'required|string',
                'establishment_type_of_business' => 'required|exists:business_types,id'
            ]);

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Create establishment
            Establishment::create([
                'user_id' => $user->id,
                'name' => $request->establishment_name,
                'description' => $request->establishment_description,
                'address' => $request->establishment_address,
                'mode_of_access' => $request->establishment_mode_of_access,
                'contact_number' => $request->establishment_contact_number,
                'business_type_id' => $request->establishment_type_of_business,
            ]);

            return redirect('/accounts')->with('success', 'Establishment owner and establishment created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating establishment: ' . $e->getMessage());
        }
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
