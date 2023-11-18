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
        Schema::table('users', function($table) {
            $table->string('role')->default('user');
            $table->string('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('sim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn('role');
            $table->dropColumn('alamat');
            $table->dropColumn('telp');
            $table->dropColumn('sim');
        });
    }
};
