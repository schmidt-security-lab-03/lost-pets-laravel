<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pet_reports', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 100);
            $table->string('species', 20);
            $table->string('breed', 100)->nullable();
            $table->string('color', 100);
            $table->string('city', 120)->index();
            $table->string('neighborhood', 120);
            $table->date('last_seen_at')->index();
            $table->text('description');
            $table->string('status', 20)->default('lost')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_reports');
    }
};
