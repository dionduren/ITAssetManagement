<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserLaptopController extends Controller
{
    public function index()
    {
        $userJsonPath = resource_path('json/master_karyawan.json');
        $userData = json_decode(File::get($userJsonPath), true);

        return view('main/transaction/user/index', compact('userData'));
    }

    public function create(): View
    {
        return view('main/transaction/user/create');
    }
}
