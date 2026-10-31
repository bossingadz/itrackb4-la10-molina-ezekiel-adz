<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('platform');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('platform_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['platform_id']);
            $table->dropColumn('platform_id');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->string('platform')->nullable();
        });

        Schema::dropIfExists('platforms');
    }
};