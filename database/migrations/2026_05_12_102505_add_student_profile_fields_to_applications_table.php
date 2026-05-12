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
        Schema::table('applications', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('birth_date');
            $table->string('student_phone', 30)->nullable()->after('gender');
            $table->string('grade_level', 120)->nullable()->after('student_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['gender', 'student_phone', 'grade_level']);
        });
    }
};
