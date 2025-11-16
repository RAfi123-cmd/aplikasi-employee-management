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
            $table->uuid('id')->primary();
            $table->string('nik', 16)->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('position', ['Staff','Admin', 'Supervisor', 'Manager', 'Intern']);
            $table->enum('division', ['HRD','Finance', 'IT', 'Marketing', 'Operating', 'GA']);
            $table->date('joined_at');
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->enum('status_employee', ['Aktif','Non-aktif', 'Resign', 'Cuti'])->nullable();
            $table->decimal('base_salary', 15, 2)->nullable();
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
