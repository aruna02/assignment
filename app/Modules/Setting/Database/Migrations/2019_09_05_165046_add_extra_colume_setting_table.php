<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumeSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('bank_account')->nullable()->after('basic_salary_percentage');
            $table->text('bank_name')->nullable()->after('basic_salary_percentage');
            $table->decimal('normal_holiday_ot_rate', 4, 2)->default(0)->nullable();
            $table->decimal('special_holiday_ot_rate', 4, 2)->default(0)->nullable();
            $table->decimal('general_ot_rate', 4, 2)->default(0)->nullable();
            $table->string('currency')->default('Rs.')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('bank_account');
            $table->dropColumn('bank_name');
        });
    }
}
