<?php
namespace App\Http\Controllers\Snippets;

use App\Models\Theme;
use App\Models\Snippet;
use Livewire\Component;
use App\Models\Language;

class CreateComponent extends Component
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

    public function mount()
    {
        $snippet = new Snippet;
        $snippet->id = 0;
        $snippet->snippet = '// start coding';
        $snippet->language = Language::first()->key;
        $snippet->theme = Theme::first()->key;

        $this->languages = Language::all()->toArray();
        $this->snippet = $snippet;
        $this->themes = Theme::all()->toArray();
    }

    public function render()
    {
        return view('snippets.create')
                ->layout('components.layout');
    }
}
