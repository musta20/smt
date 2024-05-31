<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('shop_carts', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('product_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignUlid('user_id')
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
        Schema::dropIfExists('shop_carts');
    }
};
