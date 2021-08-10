<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Theme;
use App\Models\Snippet;
use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Snippets\EditRequest;
use App\Http\Requests\Snippets\CreateRequest;
use App\Http\Requests\Snippets\DeleteRequest;
use App\Http\Requests\Snippets\ApproveRequest;
use App\Http\Requests\Snippets\UnapproveRequest;

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
        $snippet = new Snippet;
        $snippet->id = 0;
        $snippet->snippet = '// start coding';
        $snippet->language = Language::first()->key;
        $snippet->theme = Theme::first()->key;

        return view('snippets.create', compact('snippet'));
    }

    /**
     * Handle creating a snippet.
     *
     * @param \App\Http\Requests\Snippets\CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = new Snippet;
        $snippet->snippet = $request->input('snippet');
        $snippet->language = $request->input('language');
        $snippet->theme = $request->input('theme');
        $snippet->tags = null;
        $snippet->direct_url = $request->input('direct_url');
        $snippet->approved = false;
        $snippet->anonymous = $request->input('anonymous') === 'on' ? true : false;
        $snippet->user()->associate(auth()->user());
        $snippet->save();

        return redirect()->route('snippets.index');
    }

    /**
     * Show the show view.
     *
     * @param int $snippet_id
     * @return \Illuminate\View\View
     */
    public function show(int $snippet_id): \Illuminate\View\View
    {
        $snippet = Snippet::where('id', '=', $snippet_id)->firstOrFail();

        return view('snippets.show', compact('snippet'));
    }

    /**
     * Show the edit view.
     *
     * @param int $snippet_id
     * @param \App\Http\Requests\Snippets\ApproveRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(int $snippet_id, ApproveRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = Snippet::where('id', '=', $snippet_id)->firstOrFail();
        $snippet->approved = true;
        $snippet->save();

        return redirect()->back()->with('success', ['Successfully approved a snippet.']);
    }

    /**
     * Show the edit view.
     *
     * @param int $snippet_id
     * @param \App\Http\Requests\Snippets\UnapproveRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unapprove(int $snippet_id, UnapproveRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = Snippet::where('id', '=', $snippet_id)->firstOrFail();
        $snippet->approved = false;
        $snippet->save();

        return redirect()->back()->with('success', ['Successfully unapproved a snippet.']);
    }

    /**
     * Show the edit view.
     *
     * @param int $snippet_id
     * @return \Illuminate\View\View
     */
    public function edit(int $snippet_id): \Illuminate\View\View
    {
        $snippet = Snippet::where('id', '=', $snippet_id)->firstOrFail();

        return view('snippets.edit', compact('snippet'));
    }

    /**
     * Handle editing a snippet.
     *
     * @param int $snippet_id
     * @param \App\Http\Requests\Snippets\EditRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $snippet_id, EditRequest $request): \Illuminate\Http\RedirectResponse
    {
        $snippet = Snippet::where('id', '=', $snippet_id)->firstOrFail();

        if(!auth()->user()->snippets->contains($snippet->id)) {
            return redirect()->route('snippets.index')->withErrors([
                'unowns' => 'You do not own this resource.',
            ]);
        }

        $snippet->snippet = $request->input('snippet');
        $snippet->language = $request->input('language');
        $snippet->theme = $request->input('theme');
        $snippet->direct_url = $request->input('direct_url');
        $snippet->anonymous = $request->input('anonymous') === 'on' ? true : false;
        $snippet->save();

        return redirect()->back()->with('success', ['edited' => 'Successfully edited the snippet.']);
    }

    /**
     * Handle deleting a snippet.
     *
     * @param int $snippet_id
     * @param \App\Http\Requests\Snippets\DeleteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $snippet_id, DeleteRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->snippets()->where('id', '=', $snippet_id)->firstOrFail()->delete();
        return redirect()->route('snippets.index');
    }
}
