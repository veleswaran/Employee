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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("gender");
            $table->date("dob");
            $table->date("doj");
            $table->string("address");
            $table->bigInteger("mobile");
            $table->string("email")->unique();
            $table->string("image");
            $table->foreignId("department_id")->constrained()->onDelete("cascade");
            $table->foreignId("designation_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
