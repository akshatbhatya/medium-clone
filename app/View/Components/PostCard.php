<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $content;
    public $image;
    public $link;
    public function __construct($title,$content,$image,$link)
    {
        $this->title    =$title;
        $this->content  =$content;
        $this->image    =$image;
        $this->link     =$link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-card');
    }
}
