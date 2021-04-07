<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->inique();
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_key')->nullable();
            $table->text('seo_desc')->nullable();
            $table->boolean('seen')->default(false);
            $table->boolean('active')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
