<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogNews;

class HomePageComponent extends Component
{
    public function render()
    {
       
        return view('livewire.home-page-component')->layout('layouts.base');
    }
}
