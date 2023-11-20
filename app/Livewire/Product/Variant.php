<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Rule;


class Variant extends Component
{
    public Product $product;
    
    #[Rule('required')]
    public int $price;
    #[Rule('required|min:0')]
    public int $stock;
    #[Rule('required|min_digits:3|max_digits:4')]
    public int $weight;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $this->validate();

        $this->product->skus()->create([
            'price' => $this->price*100,
            'stock' => $this->stock,
            'weight' => $this->weight,
        ]);

        $this->reset(['price', 'stock', 'weight']);
        
        $this->redirectRoute('products.edit', $this->product);

    }
}
