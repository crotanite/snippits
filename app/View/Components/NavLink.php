<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * Whether this navigation link is active.
     * @var bool
     */
    public bool $active;

    /**
     * Create a new component instance.
     *
     * @param bool $active
     * @return void
     */
    public function __construct(bool $active = false)
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}
