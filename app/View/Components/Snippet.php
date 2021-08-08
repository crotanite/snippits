<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Snippet as SnippetModel;

class Snippet extends Component
{
    public SnippetModel $snippet;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SnippetModel $snippet)
    {
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
