<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductInvoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Haal het product op dat je wilt toevoegen aan de factuur
        // $product = Product::find(1); // Pas dit aan op basis van je eigen logica om het juiste product te selecteren

        // // Controleer of het product is gevonden
        // if ($product) {
        //     // Definieer de hoeveelheid (amount) die je wilt toevoegen
        //     $amount = 3; // Pas dit aan op basis van je eigen logica

        //     // Bereken de totale prijs op basis van de hoeveelheid en de prijs van het product
        //     $totalPrice = $amount * $product->price;

        //     // Maak de ProductInvoice entry aan
        //     ProductInvoice::create([
        //         'price' => $totalPrice,
        //         'amount' => $amount,
        //         'custom_invoice_id' => 1, // Pas dit aan op basis van je eigen logica
        //         'product_id' => $product->id,
        //     ]);
        // }

    }
}
