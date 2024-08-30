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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->unsignedBigInteger('department_id'); 
            $table->string('subject')->nullable(); 
            $table->boolean('part_time')->default(0);
            $table->date('joined_date');
            $table->string('image', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            //$table->foreignId('department_id')->references('id')->on('departments') ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
