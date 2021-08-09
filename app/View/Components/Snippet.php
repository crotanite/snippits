<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Snippet as SnippetModel;

class Snippet extends Component
{
    /**
     * The readonly state of the textarea.
     * @var bool|string
     */
    public bool|string $readonly;

    /**
     * The model to use.
     * @var \App\Models\Snippet|null
     */
    public ?SnippetModel $snippet;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Snippet|null $snippet
     * @return void
     */
    public function __construct(bool|string $readonly = 'nocursor', ?SnippetModel $snippet = null)
    {
        $this->readonly = $readonly;
        $this->snippet = $snippet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.snippet');
    }
}
