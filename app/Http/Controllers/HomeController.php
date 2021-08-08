<?php
namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        $snippets = Snippet::with(['lang', 'user'])->paginate(20);

        return view('home', compact('snippets'));
    }
}
