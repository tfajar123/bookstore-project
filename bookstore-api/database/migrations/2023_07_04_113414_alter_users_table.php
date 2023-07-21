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
        Schema::table('users', function (Blueprint $table) {
            $table->text('roles')->nullable();
            $table->text('address')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('province_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("roles");
            $table->dropColumn("address");
            $table->dropColumn("city_id");
            $table->dropColumn("province_id");
            $table->dropColumn("phone");
            $table->dropColumn("avatar");
            $table->dropColumn("status");
        });
    }
};
