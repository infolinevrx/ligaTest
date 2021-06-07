<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем ненужное
            $table->dropColumn('name');

            // Добавляем нужное
            $table->string('first_name')->after('id');
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('last_name')->after('middle_name');
            $table->bigInteger('tab_number')->after('last_name');
            $table->string('phone')->after('tab_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $columns = [
            'first_name',
            'middle_name',
            'last_name',
            'tab_number',
            'phone'
        ];

        Schema::table('users', function (Blueprint $table) use ($columns) {

            $table->dropColumn($columns);

            $table->string('name')->after('id');
        });
    }
}
