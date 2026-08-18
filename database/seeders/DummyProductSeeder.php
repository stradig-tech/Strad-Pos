<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DummyProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('name');
        
        $productsData = [
            // Fruits
            ['name' => 'Fuji Apple', 'category' => 'Fruits', 'price' => 2.50, 'quantity' => 100],
            ['name' => 'Organic Banana', 'category' => 'Fruits', 'price' => 1.20, 'quantity' => 150],
            ['name' => 'Navel Orange', 'category' => 'Fruits', 'price' => 1.80, 'quantity' => 120],
            
            // Meat
            ['name' => 'Chicken Breast', 'category' => 'Meat', 'price' => 8.50, 'quantity' => 50],
            ['name' => 'Beef Steak', 'category' => 'Meat', 'price' => 15.00, 'quantity' => 30],
            ['name' => 'Pork Chops', 'category' => 'Meat', 'price' => 9.00, 'quantity' => 40],
            
            // Dairy
            ['name' => 'Whole Milk (1L)', 'category' => 'Dairy', 'price' => 3.00, 'quantity' => 80],
            ['name' => 'Cheddar Cheese Block', 'category' => 'Dairy', 'price' => 5.50, 'quantity' => 60],
            ['name' => 'Salted Butter', 'category' => 'Dairy', 'price' => 4.00, 'quantity' => 70],
            
            // Vegetable
            ['name' => 'Fresh Carrot', 'category' => 'Vegetable', 'price' => 1.50, 'quantity' => 200],
            ['name' => 'Broccoli Crown', 'category' => 'Vegetable', 'price' => 2.00, 'quantity' => 90],
            ['name' => 'Organic Spinach', 'category' => 'Vegetable', 'price' => 2.50, 'quantity' => 110],
            
            // Tea leaf
            ['name' => 'Green Tea Leaves (Loose)', 'category' => 'Tea leaf', 'price' => 12.00, 'quantity' => 40],
            ['name' => 'Black Tea Leaves (Loose)', 'category' => 'Tea leaf', 'price' => 10.00, 'quantity' => 50],
            ['name' => 'Chamomile Tea Pack', 'category' => 'Tea leaf', 'price' => 14.00, 'quantity' => 30],
        ];

        $count = 0;
        foreach ($productsData as $data) {
            $cat = $categories->get($data['category']);
            if ($cat) {
                Product::create([
                    'name' => $data['name'],
                    'sku' => uniqid('SKU-'),
                    'category_id' => $cat->id,
                    'price' => $data['price'],
                    'purchase_price' => $data['price'] * 0.7, // 30% margin
                    'quantity' => $data['quantity'],
                    'status' => 1,
                    'discount' => 0,
                    'discount_type' => 'fixed',
                ]);
                $count++;
            }
        }
        
        $this->command->info("Successfully seeded {$count} dummy products linked to your categories!");
    }
}
