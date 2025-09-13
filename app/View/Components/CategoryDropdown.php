<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::find(request('category'))
        ]);
    }
}
