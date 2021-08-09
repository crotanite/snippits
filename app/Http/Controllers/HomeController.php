<?php
namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        $snippets = Snippet::with(['lang', 'user'])->get();

        return view('snippets.index', compact('snippets'));
    }
}
