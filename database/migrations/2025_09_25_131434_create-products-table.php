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
        // Categories Table
     Schema::create('categories', function (Blueprint $table) {
    $table->id('category_id'); // Primary key
    $table->string('category_name', 100)->unique();  
    $table->timestamps(); 
  });

  // Sub-Categories Table
  Schema::create('sub_categories', function (Blueprint $table) {
    $table->id('sub_category_id'); // Primary key
    $table->string('sub_category_name', 100);  
    $table->foreignId('category_id') // Link to main category
          ->constrained('categories', 'category_id')->cascadeOnUpdate()->cascadeOnDelete();
    $table->timestamps();
  });

        // Products Table
      Schema::create('products', function (Blueprint $table) {
    $table->id('product_id'); // Primary key
    $table->string('product_name', 255);
    $table->text('description')->nullable();
    $table->string('image_url', 255)->nullable();
    $table->string('short_description', 500)->nullable();
    $table->string('sku', 100)->unique();
    $table->decimal('price', 10, 2);
    $table->decimal('discount_price', 10, 2)->default(0);
    $table->decimal('cost_price', 10, 2)->nullable();
    $table->integer('quantity_in_stock')->default(0);
    $table->integer('min_stock_level')->default(5);

    // Product will belong to a sub-category
    $table->foreignId('sub_category_id')->constrained('sub_categories', 'sub_category_id')->cascadeOnUpdate()->cascadeOnDelete();

    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->enum('is_active', ['active', 'de_active'])->default('de_active');
    $table->timestamps(); 
   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
          Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('categories');
    }
};