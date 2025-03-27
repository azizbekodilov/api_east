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
            $table->text('media')->nullable();
            $table->unsignedBigInteger('catalog_id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('update_product_id')->nullable();
            $table->decimal('balance', 16,3)->default(0);
            $table->decimal('medium_tonnage', 16,3)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_discount')->default(0);
            $table->tinyInteger('is_main_page')->default(0);
            $table->timestamp('last_update_at')->nullable();
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
