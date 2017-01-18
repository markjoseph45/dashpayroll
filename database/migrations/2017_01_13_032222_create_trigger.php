<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER comp_info AFTER INSERT ON `tbl_use` FOR EACH ROW
                        BEGIN
                           INSERT INTO `tbl_company_info` (`user_id`, `company_name`) VALUES (3, Intel);
                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `comp_info`');
    }
}
