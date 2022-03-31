<?php

namespace App\View\Components\tailwind;

use Illuminate\View\Component;

class Modals extends Component {
  public $objectName;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($objectNameParam) {
    $this->objectName = $objectNameParam;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render() {
    return view('components.tailwind.modals');
  }
}
