<?php

use App\Enums\Store\MediaType;
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
        Schema::create('media', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('name');

            $table->string('type')->default(MediaType::IMAGE->value);

            $table->foreignUlid('user_id')->index()
            ->constrained()
            ->cascadeOnDelete();
            $table->string('tenant_id');

            $table->foreign('tenant_id')
            ->references('id')
            ->on('tenants')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // $table->foreignId('tenant_id')->index()
            // ->constrained()
            // ->cascadeOnDelete();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
