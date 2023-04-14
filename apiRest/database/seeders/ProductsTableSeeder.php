<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->code = 100;
        $product->name_product = "Computador";
        $product->pryce = 3200000;
        $product->save();

        $product = new Product();
        $product->code = 101;
        $product->name_product = "Portatil";
        $product->pryce = 1200000;
        $product->save();

        $product = new Product();
        $product->code = 102;
        $product->name_product = "Nevera";
        $product->pryce = 800000;
        $product->save();

        $product = new Product();
        $product->code = 103;
        $product->name_product = "Parlante";
        $product->pryce = 200000;
        $product->save();

        $product = new Product();
        $product->code = 104;
        $product->name_product = "Mesa";
        $product->pryce = 223600;
        $product->save();

        $product = new Product();
        $product->code = 105;
        $product->name_product = "Abanico";
        $product->pryce = 80000;
        $product->save();

        $product = new Product();
        $product->code = 106;
        $product->name_product = "Monitor";
        $product->pryce = 650000;
        $product->save();

        $product = new Product();
        $product->code = 107;
        $product->name_product = "Headset Redragon";
        $product->pryce = 125000;
        $product->save();

        $product = new Product();
        $product->code = 108;
        $product->name_product = "Mando Xbox";
        $product->pryce = 230000;
        $product->save();

        $product = new Product();
        $product->code = 109;
        $product->name_product = "Gabinete aorus";
        $product->pryce = 430000;
        $product->save();
    }
}
