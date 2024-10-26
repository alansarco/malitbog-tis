<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    return view('news.index');
  }

  public function create()
  {
    return view('news.create');
  }

  public function store(Request $request)
  {
    $request->validate(['title' => 'required', 'description' => 'required']);
  }

  public function edit(News $news)
  {
    return view('news.edit', compact('news'));
  }

  public function update(Request $request, News $news)
  {
    $request->validate(['title' => 'required', 'description' => 'required']);
  }
}
