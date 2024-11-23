<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('profile_photo_path'); // Elimina la columna de la foto de perfil
    });
}

    /**
     * Reverse the migrations.
     */
        public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_photo_path', 2048)->nullable(); // Restaura la columna en caso de rollback
        });
    }
};
