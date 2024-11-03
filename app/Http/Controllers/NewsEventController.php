<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $newses = News::get();
        return view('news-and-events', compact('events', 'newses'));
    }

    public function view(string $type, int $id)
    {
      $toBeDisplay = $type == 'news' ? News::findOrFail($id) : Event::findOrFail($id);

      // dd($toBeDisplay);
      return view('display', compact('toBeDisplay'));
    }
}
