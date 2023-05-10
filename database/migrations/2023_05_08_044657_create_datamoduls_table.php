<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datamoduls', function (Blueprint $table) {
            $table->id();
            $table->string('ringno', 12);
            $table->string('la', 12);
            $table->string('lo', 12);
            $table->timestamp('backtime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('clubno', 4);
            $table->string('raceno', 8);
            $table->string('deviceno', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datamoduls');
    }
};