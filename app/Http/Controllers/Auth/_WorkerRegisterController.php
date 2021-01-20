<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;

class _WorkerRegisterController extends Controller
{
  public function register()
  {

    return view('auth.workers.register');
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'password' => 'required|string|min:6',
      ]);

      Worker::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'surname' => $request->surname,
          'dni' => $request->dni,
          'phone' => $request->phone,
      ]);

      return redirect('home');
  }

}
