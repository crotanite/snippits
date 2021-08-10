<?php

namespace App\Http\Controllers\Components;

use App\Models\Theme;
use Livewire\Component;
use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;

class ListSnippetsComponent extends Component
{
    /**
     * The select language to sort by.
     * @var string
     */
    public string $language;

	/**
	 * The available languages.
	 * @var array
	 */
    public array $languages;

	/**
	 * The snippets to list.
	 * @var \Illuminate\Database\Eloquent\Collection
	 */
    public Collection $snippets;

	/**
	 * The sorted snippets.
	 * @var \Illuminate\Database\Eloquent\Collection
	 */
    public Collection $sortedSnippets;

	/**
	 * The tags to search for.
	 * @var array
	 */
    public string $tags;

    /**
     * The select theme to sort by.
     * @var string
     */
    public string $theme;

	/**
	 * The available themes.
	 * @var array
	 */
    public array $themes;

    /**
     * Mount the component.
     *
	 * @param \Illuminate\Database\Eloquent\Collection $snippets
     * @return void
     */
    public function mount(Collection $snippets): void
    {
        $this->language = '';
        $this->languages = Language::all()->toArray();
        $this->snippets = $snippets;
        $this->tags = '';
        $this->theme = '';
        $this->themes = Theme::all()->toArray();

        $this->sortSnippets();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('components.snippet.manifest');
    }

    /**
     * Do something on updated "language".
     *
     * @return void
     */
    public function updatedLanguage(): void
    {
        $this->sortSnippets();
    }

    /**
     * Do something on updated "tags".
     *
     * @return void
     */
    public function updatedTags(): void
    {
        $this->sortSnippets();
    }

    /**
     * Do something on updated "theme".
     *
     * @return void
     */
    public function updatedTheme(): void
    {
        $this->sortSnippets();
    }

    /**
     * Sort the snippets.
     *
     * @return void
     */
    private function sortSnippets(): void
    {
        $sort = $this->snippets;

        if($this->language !== '') {
            $sort = $sort->where('language', '=', $this->language);
        }

        if($this->tags !== '') {
            $tags = explode(',', $this->tags);
            $sort = $sort->filter(function($item) use($tags) {
                $state = false;
                foreach($tags as $tag) {
                    if($state === true) {
                        break;
                    }

                    if(in_array($tag, $item->tags ?? [])) {
                        $state = true;
                        break;
                    }
                }
                return $state;
            });
        }

        if($this->theme !== '') {
            $sort = $sort->where('theme', '=', $this->theme);
        }

        $this->sortedSnippets = $sort;

        $this->dispatchBrowserEvent('refresh-masonry');
    }
}
