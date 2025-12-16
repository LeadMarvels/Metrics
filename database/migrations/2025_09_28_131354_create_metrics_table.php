<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('category')->nullable()->index();
            $table->nullableMorphs('measurable');
            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('month');
            $table->unsignedTinyInteger('day');
            $table->unsignedInteger('value');
            $table->date('date_at')->nullable();
            $table->timestamps();

            $table->index(['year', 'month', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metrics');
    }
};
