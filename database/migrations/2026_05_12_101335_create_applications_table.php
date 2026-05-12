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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_surname');
            $table->string('identity_number');
            $table->date('birth_date');
            $table->text('address');
            $table->string('proximity_degree')->nullable();
            $table->string('current_school');
            $table->text('health_issue')->nullable();
            $table->string('parent_name');
            $table->string('parent_surname');
            $table->string('parent_phone');
            $table->string('parent_email')->nullable();
            $table->string('parent_job')->nullable();
            $table->string('emergency_name');
            $table->string('emergency_phone');
            $table->string('status')->default('yeni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
