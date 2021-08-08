<?php
namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function index()
    {
        $invites = auth()->user()->invites;

        return view('invites', compact('invites'));
    }

    /**
     * Handle creating a new invite code.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(): \Illuminate\Http\RedirectResponse
    {
        Invite::create([
            'user_id' => auth()->user()->id,
            'code' => Str::random(15),
        ]);

        return redirect('/invites');
    }
}
