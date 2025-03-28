<?php

use App\Enums\Store\Currency;
use App\Enums\Store\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('stores', function (Blueprint $table) {

            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('domain')->nullable();
            $table->string('cover')->nullable();

            $table->mediumText('description')->nullable();

            $table->string('currency')->default(Currency::EGP->value);
            $table->string('status')->default(Status::PUBLISHED->value);

            $table->string('tenant_id');

            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->longText('term')->nullable();
            $table->longText('about')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('specialty')->nullable();

            $table->json('SocialMedia');

            $table->foreignUlid('user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
