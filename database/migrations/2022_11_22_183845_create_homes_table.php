<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('about_banner_img')->nullable();
            $table->string('about_meta_title')->nullable();
            $table->string('about_meta_keywords')->nullable();
            $table->text('about_meta_description')->nullable();

            $table->string('team_meta_title')->nullable();
            $table->string('team_meta_keywords')->nullable();
            $table->text('team_meta_description')->nullable();

            $table->string('gallery_meta_title')->nullable();
            $table->string('gallery_meta_keywords')->nullable();
            $table->text('gallery_meta_description')->nullable();

            $table->string('career_meta_title')->nullable();
            $table->string('career_meta_keywords')->nullable();
            $table->text('career_meta_description')->nullable();

            $table->string('contact_meta_title')->nullable();
            $table->string('contact_meta_keywords')->nullable();
            $table->text('contact_meta_description')->nullable();

            $table->string('project_meta_title')->nullable();
            $table->string('project_meta_keywords')->nullable();
            $table->text('project_meta_description')->nullable();

            $table->string('media_meta_title')->nullable();
            $table->string('media_meta_keywords')->nullable();
            $table->text('media_meta_description')->nullable();
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
        Schema::dropIfExists('homes');
    }
}
