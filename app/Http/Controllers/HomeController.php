<?php
namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        $snippets = Snippet::with(['lang', 'user'])
                ->when(!auth()->check() || (auth()->check() && auth()->user()->email !== config('app.initial_user.email')), function($q) {
                    $q->where('approved', '=', true);
                })
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('snippets.index', compact('snippets'));
    }
}
