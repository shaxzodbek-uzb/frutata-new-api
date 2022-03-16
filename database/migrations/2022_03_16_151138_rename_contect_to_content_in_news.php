<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameContectToContentInNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('contect', 'content');
            $table->renameColumn('contect_ru', 'content_ru');
            $table->renameColumn('contect_en', 'content_en');
        });
    }
}