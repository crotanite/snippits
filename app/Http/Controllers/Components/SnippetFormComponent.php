<?php
namespace App\Http\Controllers\Components;

use App\Models\Theme;
use App\Models\Snippet;
use Livewire\Component;
use App\Models\Language;

class SnippetFormComponent extends Component
{
	/**
	 * The available languages.
	 * @var array
	 */
    public array $languages;

	/**
	 * The editable snippet.
	 * @var \App\Models\Snippet
	 */
    public Snippet $snippet;

	/**
	 * The available themes.
	 * @var array
	 */
    public array $themes;

    protected $rules = [
        'snippet.language' => ['required', 'exists:languages,key'],
        'snippet.theme' => ['required', 'exists:themes,key'],
    ];

    /**
     * Mount the component.
     *
     * @param \App\Models\Snippet $snippet
     * @return void
     */
    public function mount(Snippet $snippet)
    {
        $this->languages = Language::all()->toArray();
        $this->snippet = $snippet;
        $this->themes = Theme::all()->toArray();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('components.snippet.form');
    }
}
