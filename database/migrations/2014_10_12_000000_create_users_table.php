<?php

use App\Enums\Gender;
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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum('gender', array_map(fn($gender) => $gender->value, Gender::cases()));
            $table->string('code')->nullable()->comment('Bisa untuk nisn/nip/nim/npm');
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('username')->unique();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
