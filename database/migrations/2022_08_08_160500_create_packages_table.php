<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //php artisan migrate --path database/migrations/2022_08_08_160500_create_packages_table.php
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('package_price');
            $table->boolean('main_page_logo')->default(0);
            $table->boolean('website_link');
            $table->boolean('directory_logo');
            $table->boolean('full_info');
            $table->integer('branches');
            $table->string('branch_discount');
            $table->boolean('meeting_pirority');
            $table->string('conference_discount');
            $table->boolean('news_priority');
            $table->integer('youtube_videos');
            $table->boolean('networking');
            $table->boolean('businiess_relation');
            $table->boolean('annual_conference');
            $table->text('direct_access');
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
        Schema::dropIfExists('packages');
    }
}
