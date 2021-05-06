<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
  public function ems(){
    return view('homepage.index');
  }


  public function permission(){
    echo "You don't have any permission to access this ";
  }
}
