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
        Schema::create('administrator_logins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("administrator_id");
            $table->boolean("logged_in");
            $table->bigInteger("logged_in_at");
            $table->bigInteger("logged_out_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrator_logins');
    }
};
