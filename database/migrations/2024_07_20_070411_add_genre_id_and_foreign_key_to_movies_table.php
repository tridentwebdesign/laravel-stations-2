<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenreIdAndForeignKeyToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            if (!Schema::hasColumn('movies', 'genre_id')) {
                $table->unsignedBigInteger('genre_id')->nullable()->after('id')->comment('ジャンルID');
                $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            if (Schema::hasColumn('movies', 'genre_id')) {
                $table->dropForeign(['genre_id']);
                $table->dropColumn('genre_id');
            }
        });
    }
}
