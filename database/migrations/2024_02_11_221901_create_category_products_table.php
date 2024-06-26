<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_products', function (Blueprint $table) {

            $table->foreignUlid('product_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUlid('category_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('tenant_id');

            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_products');
    }
};
