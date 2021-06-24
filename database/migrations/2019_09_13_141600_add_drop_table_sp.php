<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDropTableSp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
    CREATE PROCEDURE drop_tables_like(pattern VARCHAR(255), db VARCHAR(255))
BEGIN
    SET FOREIGN_KEY_CHECKS = 0;
    SELECT @str_sql:=CONCAT('drop table ', GROUP_CONCAT(table_name))
    FROM information_schema.tables
    WHERE table_schema=db AND table_name LIKE pattern;

    PREPARE stmt from @str_sql;
    EXECUTE stmt;
    DROP prepare stmt;
END
";

        \Illuminate\Support\Facades\DB::unprepared("DROP procedure IF EXISTS drop_tables_like");
        \Illuminate\Support\Facades\DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared("DROP procedure IF EXISTS drop_tables_like");
    }
}
