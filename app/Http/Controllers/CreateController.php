<?php
namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSnippetRequest;

class CreateController extends Controller
{
    /**
     * Show the create view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $languages = Language::all();

        return view('create', compact('languages'));
    }

    /**
     * Handle creating a snippet.
     *
     * @param \App\Http\Requests\CreateSnippetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSnippetRequest $request): \Illuminate\Http\RedirectResponse
    {
        Snippet::create([
            'user_id' => auth()->user()->id,
            'snippet' => $request->input('snippet'),
            'language' => $request->input('language'),
            'theme' => $request->input('theme'),
            'tags' => null,
            'direct_url' => $request->input('url'),
            'approved' => false,
            'anonymous' => $request->input('anonymous') === 'on' ? true : false,
        ]);

        return redirect('/');
    }
}
