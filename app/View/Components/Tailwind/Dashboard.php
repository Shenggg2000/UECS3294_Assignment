<?php

namespace App\View\Components\tailwind;

use Illuminate\View\Component;

class Dashboard extends Component {
  public $bannerTitle;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($bannerTitleParam) {
    $this->bannerTitle = $bannerTitleParam;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render() {
    return view('components.tailwind.dashboard');
  }
}
