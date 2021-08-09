<?php

namespace App\Http\Controllers\Components;

use App\Models\Theme;
use Livewire\Component;
use App\Models\Language;

class SnippetSearchComponent extends Component
{
	/**
	 * The available languages.
	 * @var array
	 */
    public array $languages;

	/**
	 * The available themes.
	 * @var array
	 */
    public array $themes;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->languages = Language::all()->toArray();
        $this->themes = Theme::all()->toArray();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('components.snippet.search');
    }
}
