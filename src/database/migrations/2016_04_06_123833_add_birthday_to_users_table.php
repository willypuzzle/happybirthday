<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdayToUsersTable extends Migration
{
    private $table;
    private $field;

    public function __construct()
    {
        $this->table = config('happybirthday.database.table.name');
        $this->field = config('happybirthday.database.table.field');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->date($this->field)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn($this->field);
        });
    }
}
