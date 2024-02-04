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
            $table->ulid('id')->primary();
            $table->string('name');
            $table->mediumText('description');
            $table->unsignedDouble('price');

            $table->string('order_url');
            
            $table->unsignedDouble('older_price')->nullable();
            $table->unsignedInteger('discount')->nullable();
            $table->string('tenant_id');

            $table->foreign('tenant_id')
            ->references('id')
            ->on('tenants')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // $table->foreignId('tenant_id')->index()
            // ->constrained()
            // ->cascadeOnDelete();

            $table->foreignUlid('store_id')->index()
           // ->constrained()
            ->cascadeOnDelete();
            
            $table->json('tags')->nullable();

            $table->foreignUlid('category_id')->index()
            ->constrained()
            ->cascadeOnDelete();

            $table->softDeletes();

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
