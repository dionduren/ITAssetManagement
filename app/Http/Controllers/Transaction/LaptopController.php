<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaptopController extends Controller
{
    public function index()
    {
        $laptopJsonPath = resource_path('json/master_laptop.json');
        $laptopData = json_decode(File::get($laptopJsonPath), true);

        return view('main/transaction/laptop/index', compact('laptopData'));
    }

    public function create(): View
    {
        return view('main/transaction/laptop/create');
    }
}
