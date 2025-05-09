<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UsuariosModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:30',
            'user_type' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:usuarios',
            'direccion' => 'nullable|string'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = UsuariosModel::create($validated);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);

        \Log::info('Attempting login with:', $validated);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        throw ValidationException::withMessages([
            'credentials' => 'The provided credentials do not match our records.'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }
}