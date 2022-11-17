<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('id');
            $table->string('lastname')->nullable()->after('name');
            $table->string('dni', 20)->nullable()->after('lastname');
            $table->date('birthdate')->nullable()->after('dni');
            $table->enum('genre', ['M', 'F'])->nullable()->after('birthdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'lastname',
                'dni',
                'birthdate',
                'genre'
            ]);
        });
    }
};
