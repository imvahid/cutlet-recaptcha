<?php

namespace Va\CutletRecaptcha\View\Components;

use Illuminate\View\Component;

class CutletRecaptcha extends Component
{
    public $hasError;

    /**
     * Create a new component instance.
     *
     * @param bool $hasError
     */
    public function __construct(bool $hasError)
    {
        $this->hasError = $hasError;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('cutlet-recaptcha::cutlet-recaptcha');
    }
}
