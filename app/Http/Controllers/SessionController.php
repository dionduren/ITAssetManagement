<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
  public function checkSession(Request $request)
  {
    if ($request->session()->isStarted()) {
      // Session has been started
      $sessionData = $request->session()->all();

      // Return or display session data for debugging purposes
      return response()->json($sessionData);
    } else {
      // Session has not been started
      return response()->json(['message' => 'No active session']);
    }
  }

  public function profile()
  {
    $userId = session('user_id');
    $userName = session('user_name');
    $userUsername = session('user_username');
    $userEmail = session('user_email');

    // Use the data as needed
    return view('main/auth/check-profile', compact('userId', 'userName', 'userUsername', 'userEmail'));
  }
}
