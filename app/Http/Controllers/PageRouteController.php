<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageRouteController extends Controller
{
  public function dashboardOverview(): View
  {
    return view('main/dashboard/overview');
  }

  public function laptop_index(): View
  {
    return view('main/transaction/laptop/index');
  }

  public function laptop_create(): View
  {
    return view('main/transaction/laptop/create');
  }
}
