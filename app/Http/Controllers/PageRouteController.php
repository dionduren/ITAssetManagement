<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageRouteController extends Controller
{
  public function dashboardOverview(): View
  {
    return view('main/dashboard/overview');
  }

  public function laptop_index(): View
  {
    // Load JSON files
    $karyawanJsonPath = resource_path('json/master_karyawan.json');
    $laptopJsonPath = resource_path('json/master_laptop.json');

    // Decode JSON
    $karyawanData = json_decode(File::get($karyawanJsonPath), true);
    $laptopData = json_decode(File::get($laptopJsonPath), true);

    // Merge data based on 'emp_no'
    $mergedData = [];
    foreach ($karyawanData as $employee) {
      $empNo = $employee['emp_no'];
      $laptopInfo = collect($laptopData)->firstWhere('emp_no', $empNo);

      $mergedData[] = [
        'emp_no' => $empNo,
        'nama' => $employee['nama'],
        'employee_status' => $employee['employee_status'],
        'pos_title' => $employee['pos_title'],
        'laptop' => $laptopInfo['Laptop'] ?? ' - ',
        'asset_no' => $laptopInfo['No. Asset'] ?? ' - '
      ];
    }

    return view('main/transaction/join/index', compact('mergedData'));
  }

}
