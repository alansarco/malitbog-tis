<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\BusinessType;
use App\Models\User;
use Illuminate\Http\Request;

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

  public function store(AccountStoreRequest $request) {}

  public function edit($id)
  {
    $businessTypes = BusinessType::all();
    $user = User::findOrFail($id);
    return view('accounts.edit', compact('user', 'businessTypes'));
  }

  public function update(AccountUpdateRequest $request, $id) {}
}
