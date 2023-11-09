<?php

namespace App\Livewire\ProductVariant;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Product $product;
    public string $name;
    public int $stock;
    public int $price;
    public int $weight;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = 'test';
    }

    public function render()
    {
        return view('livewire.product-variant.create');
    }
}
