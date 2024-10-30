<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\BusinessType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
  public function index()
  {
    return view('accounts.index');
  }

  public function create()
  {
    $businessTypes = BusinessType::all();
    return view('accounts.create', compact('businessTypes'));
  }

  public function store(AccountStoreRequest $request)
    {
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create the establishment
        Establishment::create([
            'user_id' => $user->id,
            'name' => $request->establishment_name,
            'description' => $request->establishment_description,
            'address' => $request->establishment_address,
            'mode_of_access' => $request->establishment_mode_of_access,
            'contact_number' => $request->establishment_contact_number,
            'business_type_id' => $request->establishment_type_of_business,
        ]);

        // Redirect back to /accounts
        return redirect('/accounts')->with('success', 'Establishment owner and establishment created successfully.');
    }

  public function edit($id)
  {
    $businessTypes = BusinessType::all();
    $user = User::findOrFail($id);
    return view('accounts.edit', compact('user', 'businessTypes'));
  }

  public function update(AccountUpdateRequest $request, $id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Update user details
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        // Only update the password if a new password is provided
        'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
    ]);

    // Update establishment details if provided
    if ($request->has('establishment_name')) {
        $user->establishment->update([
            'name' => $request->establishment_name,
            'description' => $request->establishment_description,
            'address' => $request->establishment_address,
            'mode_of_access' => $request->establishment_mode_of_access,
            'contact_number' => $request->establishment_contact_number,
            'business_type_id' => $request->establishment_type_of_business,
        ]);
    }

    return redirect('/accounts')->with('success', 'Account updated successfully.');
}

}
