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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('geolocation_longitude');
            $table->string('geolocation_latitude');
            $table->string('mode_of_transportation');
            $table->string('hours_of_operation');
            $table->string('contact_number')->default('NA');
            $table->string('category');
            $table->string('status');
            $table->date('date_of_site_visit');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
