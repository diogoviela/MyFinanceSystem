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
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('value', 9, 2);
            $table->text('description');
            $table->enum('recurrence', ['Monthly', 'Weekly', 'Daily']);
            $table->dateTime('created_at')->index();
            $table->dateTime('updated_at')->index();
            $table->unsignedInteger('created_by')->index();

            // foreign keys
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
