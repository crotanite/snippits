<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $snippets = auth()->user()->snippets;

        return view('dashboard', compact('snippets'));
    }
}
