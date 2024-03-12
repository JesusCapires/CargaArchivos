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
        Schema::create('load_detail_selections', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('detail_selection_id');

            $table->foreign('detail_selection_id')
                ->references('id')
                ->on('detail_selections')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('load_detail_selections');
    }
};
