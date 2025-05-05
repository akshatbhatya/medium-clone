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
    public $username;
    public $postid;
    public function __construct($username,$title,$content,$image,$link,$postid)
    {
        
        $this->title    =$title;
        $this->content  =$content;
        $this->image    =$image;
        $this->link     =$link;
        $this->username =$username;
        $this->postid    =$postid;
       
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-card');
    }
}
