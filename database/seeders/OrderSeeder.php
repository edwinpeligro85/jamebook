<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderOneId = DB::table('orders')->insertGetId([
            'user_id' => 1,
            'sub_total' => 500,
            'delivery_total' => 0,
            'discount_total' => 0,
            'tax_total' => 0,
            'order_total' => 500,
            'shipping_method' => "Only",
            'payment_method' => "Credi-Cuerpo",
            'tracking_no' => 1,
            'reference' => "123",
            'notes' => "ninguna",
            'shipping_phone' => "3216826730",
            'shipping_firstname' => "Jherson",
            'shipping_lastname' => "Rendon",
            'shipping_address' => "Aca",
            'shipping_city' => "Pereira",
            'shipping_state' => "Risaralda",
            'shipping_country' => "Colombia"
        ]);

        DB::table('order_lines')->insert([
            'order_id' => $orderOneId,
            'book_id' => 1,
            'isbn' => '123',
            'title' => 'prueba',
            'quantity' => 2
        ]);

        $orderTwoId = DB::table('orders')->insertGetId([
            'user_id' => 1,
            'sub_total' => 800,
            'delivery_total' => 0,
            'discount_total' => 0,
            'tax_total' => 0,
            'order_total' => 800,
            'shipping_method' => "Only",
            'payment_method' => "Credi-Cuerpo",
            'tracking_no' => 1,
            'reference' => "321",
            'notes' => "ninguna",
            'shipping_phone' => "3216826730",
            'shipping_firstname' => "Jherson",
            'shipping_lastname' => "Rendon",
            'shipping_address' => "Aca",
            'shipping_city' => "Pereira",
            'shipping_state' => "Risaralda",
            'shipping_country' => "Colombia"
        ]);

        DB::table('order_lines')->insert([
            'order_id' => $orderTwoId,
            'book_id' => 1,
            'isbn' => '123',
            'title' => 'prueba',
            'quantity' => 1
        ]);
    }
}
