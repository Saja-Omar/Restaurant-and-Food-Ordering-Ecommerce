<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('thumb_image');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // لا حاجة لـ nullable هنا
            $table->text('short_description');
            $table->text('long_description');
            $table->double('price');
            $table->double('offer_price')->default(0);
            $table->string('sku')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('show_at_home');
            $table->boolean('status');
            // $table->integer('quantity')->default(1); // إضافة عمود الكمية

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
