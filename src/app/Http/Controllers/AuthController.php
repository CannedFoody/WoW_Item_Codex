<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() : View {
        return view(
          "auth.login",
          [
            "title" => "Login"
          ]
        );
    }

    public function authenticate(Request $request): RedirectResponse {
        $cred = $request->only("name", "password");

        if(Auth::attempt($cred)){
            $request->session()->regenerate();

            return redirect("/classes");
        }

        return back()->withErrors([
            "name" => "Authentication failed...",
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    }
