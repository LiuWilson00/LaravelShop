<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  function home(Request $request)
  {
    return view('home');
  }

  function about(Request $request)
  {

    $level = $request->input('level');
    $version = $request->input('version');

    return view(
      'about',
      [
        'ver' => $version,
        'level' => $level
      ]
    );
  }
}
