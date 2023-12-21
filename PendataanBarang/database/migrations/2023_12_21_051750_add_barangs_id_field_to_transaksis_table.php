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
        Schema::table('transaksis', function (Blueprint $table) {
            //
            $table->foreignId('barangs_id')->after('users_id')->constrained()->onDelete('cascade')->onUpadte('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
            $table->dropForeign('transaksis_barangs_id_foreign');
            $table->dropColumn('barangs_id');
        });
    }
};
