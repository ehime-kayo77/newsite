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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name', 100);
            $table->tinyInteger('type');
            $table->enum('season', ['春', '夏', '秋', '冬' , 'その他']);
            $table->unsignedInteger('duration_in_minutes')->nullable(); 
            $table->unsignedInteger('cost_per_meal')->nullable();           
            $table->string('detail', 500);
            $table->string('link', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
