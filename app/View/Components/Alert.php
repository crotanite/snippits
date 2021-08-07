<?php

namespace App\View\Components;

use App\View\Traits\Theme;
use Illuminate\View\Component;

class Alert extends Component
{
    use Theme;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $theme = 'info')
    {
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
