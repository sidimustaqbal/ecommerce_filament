<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products | E Commerce App')]

class ProducsPage extends Component
{
    use WithPagination;

    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);
        return view('livewire.producs-page', [
            'products' => $productQuery->paginate(3),
            'brands'=>Brand::where('is_active',1)->get(['id','name','slug']),
            'categories'=>Category::where('is_active',1)->get(['id','name','slug']),
        ]);
    }
}
