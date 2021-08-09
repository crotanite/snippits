<?php

namespace App\View\Components\Snippet;

use App\Models\Snippet;
use Illuminate\View\Component;

class Tags extends Component
{
    /**
     * The model to use.
     * @var \App\Models\Snippet
     */
    public Snippet $snippet;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Snippet $snippet
     * @return void
     */
    public function __construct(Snippet $snippet)
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
        return view('components.snippet.tags');
    }
}
