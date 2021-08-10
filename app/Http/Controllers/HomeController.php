<?php
namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        $approved = !auth()->check() || (auth()->check() && auth()->user()->email !== config('app.initial_user.email'));

        $snippets = Snippet::with(['lang', 'user'])
                ->where('approved', '=', $approved)
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('snippets.index', compact('snippets'));
    }
}
