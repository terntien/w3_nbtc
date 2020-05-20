<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MapController extends Controller
{
      public function show()
        {
          return response()->view('index')->header('Content-Type', 'text/xml');
        }
}
