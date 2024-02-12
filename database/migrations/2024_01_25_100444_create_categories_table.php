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
        Schema::create('categories', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('category_id')
                ->nullable()
                ->index()
                ->constrained();
                $table->string('tenant_id');

                $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
                $table->foreignUlid('category_product_id')
                ->nullable()
                ->index()
                // ->constrained()
                ->cascadeOnDelete();
            $table->string('name');

            $table->foreignUlid('store_id')
                ->index()
               //->constrained();
               ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
