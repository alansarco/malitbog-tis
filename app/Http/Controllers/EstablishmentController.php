<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Models\BusinessType;
use App\Models\Establishment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    // $users = User::leftJoin('establishments', 'users.id', '=', 'establishments.user_id')
    // ->whereNull('establishments.user_id')
    // ->select('users.*')
    // ->get();
    $businessTypes = BusinessType::all();
    return view('establishments.create', compact('businessTypes', 'users'));
  }

  public function requests()
  {
    return view('requests.index');
  }

  public function store(AccountStoreRequest $request)
  {
    // Validate input
    $request->validate([
      'establishment_name' => 'required|string|max:255',
      'establishment_description' => 'required|string',
      'establishment_address' => 'required|string|max:255',
      'establishment_contact_number' => 'required|string|max:20',
      'establishment_mode_of_access' => 'required',
      'establishment_type_of_business' => 'required|exists:business_types,id'
    ]);

    try {
      $role = Role::whereNot('name', 'admin')->first();
      // Create a new user
      $user = User::create([
        'role_id' => $role->id,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);

      // Create establishment
      $establishment = Establishment::create([
        'user_id' => $user->id,
        'name' => $request->establishment_name,
        'description' => $request->establishment_description,
        'address' => $request->establishment_address,
        'mode_of_access' => implode(', ', $request->establishment_mode_of_access),
        'geolocation_longitude' => $request->establishment_geolocation_latitude,
        'geolocation_latitude' => $request->establishment_geolocation_longitude,
        'contact_number' => $request->establishment_contact_number,
        'business_type_id' => $request->establishment_type_of_business,
      ]);
      
      
      if ($request->has('image')) {
        $path = Storage::put('/public/establishments', $request->image);
        $establishment->update(['path' => $path]);
      }
      return redirect(route('establishments.index'))->with('success', 'Establishment owner and establishment created successfully.');
    } catch (\Exception $e) {
      return redirect(route('establishments.index'))->with('error', 'Error creating establishment.');
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
    if ($request->has('image')) {
      $path = Storage::put('/public/establishments', $request->image);
      $establishment->update([
        'user_id' => $request->establishment_owner,
        'name' => $request->establishment_name,
        'description' => $request->establishment_description,
        'address' => $request->establishment_address,
        'geolocation_longitude' => $request->establishment_geolocation_longitude,
        'geolocation_latitude' => $request->establishment_geolocation_latitude,
        'mode_of_access' => implode(', ', $request->establishment_mode_of_access),
        'contact_number' => $request->establishment_contact_number,
        'path' => $path,
        'business_type_id' => $request->establishment_type_of_business
      ]);
    }
    else {
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
    }

    return redirect('/my-establishment')->with('update', 'Account updated successfully.');
  }
}
