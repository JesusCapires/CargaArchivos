<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_selections', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('NOW()'));
            $table->string('serial', 45);
            $table->string('batch', 45);
            $table->integer('shift');
            $table->integer('ok');
            $table->integer('n_ok');
            $table->integer('total');

            $table->unsignedBigInteger('selection_id');

            $table->foreign('selection_id')
                ->references('id')
                ->on('selections')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->text('observation');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_selections');
    }
};
