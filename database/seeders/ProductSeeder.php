<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Product::create(['name' => 'রুটি', 'price' => '10', 'product_category_id' => '1']);
        Product::create(['name' => 'পরোটা', 'price' => '10', 'product_category_id' => '1']);
        Product::create(['name' => 'ডিম', 'price' => '20', 'product_category_id' => '1']);
        Product::create(['name' => 'ডাল', 'price' => '20', 'product_category_id' => '1']);
        Product::create(['name' => 'ভাজি', 'price' => '20', 'product_category_id' => '1']);
        Product::create(['name' => 'চিকেন সুপ', 'price' => '80', 'product_category_id' => '1']);
        Product::create(['name' => 'খাসির পায়া', 'price' => '80', 'product_category_id' => '1']);
        Product::create(['name' => 'গরুর নেহারী', 'price' => '80', 'product_category_id' => '1']);
        Product::create(['name' => 'খাসির ভুনা', 'price' => '170', 'product_category_id' => '1']);
        Product::create(['name' => 'খাসির কলিজা', 'price' => '100', 'product_category_id' => '1']);
        Product::create(['name' => 'খাসির মগজ', 'price' => '100', 'product_category_id' => '1']);
        Product::create(['name' => 'খাসির ভুনা খিচুরী', 'price' => '170', 'product_category_id' => '1']);
        Product::create(['name' => 'বিফ ভুনা', 'price' => '170', 'product_category_id' => '1']);
        Product::create(['name' => 'চিকেন ভুনা খিচুরী', 'price' => '140', 'product_category_id' => '1']);
        Product::create(['name' => 'তেহারি', 'price' => '120', 'product_category_id' => '1']);
        Product::create(['name' => 'সিঙ্গারা/সমুচা', 'price' => '10', 'product_category_id' => '1']);
        Product::create(['name' => 'চা (প্রতি কাপ)', 'price' => '15', 'product_category_id' => '1']);
        Product::create(['name' => 'চা (পার্সেল)', 'price' => '20', 'product_category_id' => '1']);
        Product::create(['name' => 'কফি (প্রতি কাপ)', 'price' => '50', 'product_category_id' => '1']);

        //2
        Product::create(['name' => 'সাদা ভাত', 'price' => '30', 'product_category_id' => '2']);
        Product::create(['name' => 'চিনিগুড়া চালের কাচ্চি বিরিয়ানী', 'price' => '180', 'product_category_id' => '2']);
        Product::create(['name' => 'বাসমতি চালের কাচ্চি বিরিয়ানী', 'price' => '200', 'product_category_id' => '2']);
        Product::create(['name' => 'চিকেন বিরিয়ানী', 'price' => '140', 'product_category_id' => '2']);
        Product::create(['name' => 'মাটন খিচুরি', 'price' => '170', 'product_category_id' => '2']);
        Product::create(['name' => 'চিকেন খিচুরি', 'price' => '140', 'product_category_id' => '2']);
        Product::create(['name' => 'বিফ খিচুরি', 'price' => '170', 'product_category_id' => '2']);
        Product::create(['name' => 'চিকেন ঝাল ফ্রাই', 'price' => '140', 'product_category_id' => '2']);
        Product::create(['name' => 'চিকেন রোস্ট', 'price' => '120', 'product_category_id' => '2']);
        Product::create(['name' => 'চিকেন মসোল্লাম', 'price' => '180', 'product_category_id' => '2']);


        //3
        Product::create(['name' => 'মিনালের ওয়াটার', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'কেক/স্প্রাইট/ফানটা', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'দই', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'লাবাং', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'বোরহানি', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'ফিরনি', 'price' => '0', 'product_category_id' => '3']);
        Product::create(['name' => 'পুডিং', 'price' => '0', 'product_category_id' => '3']);

        //4
        Product::create(['name' => 'লাচ্ছি', 'price' => '70', 'product_category_id' => '4']);
        Product::create(['name' => 'ফালুদা', 'price' => '90', 'product_category_id' => '4']);
        Product::create(['name' => 'ফালুদা (পার্সেল)', 'price' => '100', 'product_category_id' => '4']);
        Product::create(['name' => 'তরমুজের জুস', 'price' => '80', 'product_category_id' => '4']);
        Product::create(['name' => 'আম জুস', 'price' => '80', 'product_category_id' => '4']);
        Product::create(['name' => 'আপেল জুস', 'price' => '100', 'product_category_id' => '4']);
        Product::create(['name' => 'আঙুর জুস', 'price' => '150', 'product_category_id' => '4']);
        Product::create(['name' => 'কমলা জুস', 'price' => '150', 'product_category_id' => '4']);
        Product::create(['name' => 'পেঁপে জুস', 'price' => '80', 'product_category_id' => '4']);
        Product::create(['name' => 'আনার জুস', 'price' => '150', 'product_category_id' => '4']);

        //5
        Product::create(['name' => 'গ্রিল চিকেন ১/৪', 'price' => '90', 'product_category_id' => '5']);
        Product::create(['name' => 'গ্রিল চিকেন ১/২', 'price' => '180', 'product_category_id' => '5']);
        Product::create(['name' => 'গ্রিল চিকেন ১', 'price' => '360', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন টিক্কা কাবাব', 'price' => '160', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন তান্দুরী', 'price' => '120', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন বটি কাবাব', 'price' => '120', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন রেশমি কাবাব', 'price' => '150', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন শরমা', 'price' => '100', 'product_category_id' => '5']);
        Product::create(['name' => 'মাটন বটি কাবাব', 'price' => '140', 'product_category_id' => '5']);
        Product::create(['name' => 'বিফ শিক কাবাব', 'price' => '120', 'product_category_id' => '5']);
        Product::create(['name' => 'বিফ চাপ', 'price' => '120', 'product_category_id' => '5']);
        Product::create(['name' => 'চিকেন চাপ', 'price' => '120', 'product_category_id' => '5']);












































































    }
}
