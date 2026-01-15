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
            $table->decimal('debit', 10,2)->default(0)->after('updated_at'); // Adiciona a coluna 'debit' do tipo decimal com precisão 10 e escala 2, valor padrão 0, após a coluna 'updated_at'. 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('debit');
        });
    }
};
