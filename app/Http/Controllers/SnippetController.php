<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Theme;
use App\Models\Snippet;
use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSnippetRequest;
use App\Http\Requests\DeleteSnippetRequest;

class SnippetController extends Controller
{
    /**
     * Show the index view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $snippets = auth()->user()->snippets()->with(['lang', 'user'])->orderBy('created_at', 'DESC')->get();

        return view('snippets.index', compact('snippets'));
    }

    /**
     * Show the create view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $languages = Language::all();
        $tags = Tag::all();

        return view('snippets.create', compact('languages', 'tags'));
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

        return redirect()->route('snippets.index');
    }

    /**
     * Handle deleting a snippet.
     *
     * @param int $snippet_id
     * @param \App\Http\Requests\DeleteSnippetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $snippet_id, DeleteSnippetRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->snippets()->where('id', '=', $snippet_id)->firstOrFail()->delete();
        return redirect()->route('snippets.index');
    }
}
