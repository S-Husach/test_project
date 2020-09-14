<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Widget extends Component
{
    public $name;
    // public $widgets = [
    //       [
    //         'name' => 'td',
    //       ],
    //       [
    //         'name' => 'td',
    //       ]
    // ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        // $this->widgets = $widgets;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.widget');
    }
}
