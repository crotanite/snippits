<?php

namespace App\View\Components\Snippet;

use App\Models\Snippet;
use Illuminate\View\Component;

class Build extends Component
{
    /**
     * The readonly state of the snippet.
     * @var bool|string
     */
    public bool|string $readonly;

    /**
     * The model to use.
     * @var \App\Models\Snippet
     */
    public Snippet $snippet;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Snippet $snippet
     * @param bool|string $readonly
     * @return void
     */
    public function __construct(Snippet $snippet, bool|string $readonly = 'nocursor')
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
        return view('components.snippet.build');
    }
}
