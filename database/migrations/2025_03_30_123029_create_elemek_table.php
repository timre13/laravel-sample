<?php

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
        Schema::create('elemek', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("description");
            $table->foreignId("category")->references("id")->on("kategoriak");
            $table->boolean("done")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elemek');
    }
};