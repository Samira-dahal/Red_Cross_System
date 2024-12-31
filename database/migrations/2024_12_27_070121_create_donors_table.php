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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('temporary_address');
            $table->string('permanent_address');
            $table->string('mobile_number');
            $table->string('secondary_number')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('bloodtype_id');
            $table->foreign('bloodtype_id')->references('id')->on('bloodtypes')->onDelete('cascade');
            $table->text('photo')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('created_date')->useCurrent();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
