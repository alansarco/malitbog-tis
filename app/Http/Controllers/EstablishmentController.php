<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\User;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
  public function index()
  {
    return view('establishments.index');
  }

  public function create()
  {
    $users = User::get();
    $businessTypes = BusinessType::all();
    return view('establishments.create', compact('businessTypes', 'users'));
  }
}
