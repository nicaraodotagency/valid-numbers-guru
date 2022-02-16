<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormatValidatorUserIdColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('format_validator_user_id')->after('password')->nullable();
            $table->text('format_validator_user_token')->after('format_validator_user_id')->nullable();
            $table->text('format_validator_user_webhook')->after('format_validator_user_token')->nullable();
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
            $table->dropColumn('format_validator_user_id');
            $table->dropColumn('format_validator_user_token');
            $table->dropColumn('format_validator_user_webhook');
        });
    }
}
