<?php

use App\Enums\Store\Status;
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
            $table->mediumText('description')->nullable();
            $table->unsignedDouble('price');

            $table->string('order_url');

            $table->unsignedDouble('older_price')->nullable();
            $table->unsignedInteger('discount')->nullable();
            $table->string('image')->nullable();

            $table->unsignedInteger('view_count')->nullable();

            $table->unsignedInteger('order_count')->nullable();
            
            $table->unsignedFloat('rating')->nullable();
            
            $table->string('tenant_id');
            
            $table->string('status')->default(Status::DRAFT);

            $table->json('visible')->default(json_encode([
                "CanReview" => false,
            ]));

            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignUlid('store_id')
            ->nullable()
            ->index()
                ->cascadeOnDelete();

            $table->json('tags')->nullable();

            // $table->foreignUlid('category_product_id')->nullable()->index()
            //     //->constrained()
            //     ->cascadeOnDelete();

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
