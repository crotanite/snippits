<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogoutRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Show the register view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('register');
    }

    /**
     * Handle creating a user.
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        User::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/login');
    }

    /**
     * Show the register view.
     *
     * @return \Illuminate\View\View
     */
    public function edit(): \Illuminate\View\View
    {
        return view('login');
    }

    /**
     * Handle logging a user in.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(auth()->attempt($request->only(['email', 'password']))) {
            // $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Handle logging a user out.
     *
     * @param \App\Http\Requests\LogoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LogoutRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
