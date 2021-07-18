<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToNotesAndResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes_and_resources', function (Blueprint $table) {
            $table->text('link')->nullable();
            $table->boolean('status')->default(1);
            $table->string('file')->nullable()->change();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes_and_resources', function (Blueprint $table) {
                $table->dropColumn('link');
                $table->string('file')->change();
            });
        }

}
