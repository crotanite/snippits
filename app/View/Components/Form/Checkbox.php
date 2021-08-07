<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * Whether the checkbox has been checked.
     * @var bool
     */
    public bool $checked;

    /**
     * Create a new component instance.
     *
     * @param bool $checked
     * @return void
     */
    public function __construct(bool $checked = false)
    {
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.checkbox');
    }
}
