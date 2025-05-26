<?php

use App\Models\TrailerSubCategory;
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
        Schema::create('trailers', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->integer('gross_weight')->nullable();
            $table->integer('unladen_weight')->nullable();
            $table->string('length');
            $table->string('width');
            $table->integer('bed_height')->nullable();
            $table->string('number_of_axles');
            $table->string('tyre_size');
            $table->foreignIdFor(TrailerSubCategory::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trailers');
    }
};
