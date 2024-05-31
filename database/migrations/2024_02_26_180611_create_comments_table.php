<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->ulid('id')->primary();
            
            $table->foreignUlid('product_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();

            $table->foreignUlid('user_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();

            $table->unsignedFloat('rating')->nullable();

            $table->mediumText('comment');

            $table->string('tenant_id');
            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
