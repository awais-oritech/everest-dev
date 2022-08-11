<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('package_id');
            $table->string('companyname');
            $table->string('ownername');
            $table->string('companyaddress');
            $table->string('companypostal');
            $table->string('companytelephone');
            $table->string('companyemail');
            $table->string('companywebsite')->nullable();
            $table->string('companyskype')->nullable();
            $table->string('companyfacebook')->nullable();
            $table->string('companyinstagram')->nullable();
            $table->string('companyyoutube')->nullable();
            $table->string('companylogo');
            $table->text('companyprofile');
            $table->string('startdate');
            $table->string('branchaddress');
            $table->string('companylicense');
            $table->string('vatnumber');
            $table->string('bankdetails');
            $table->string('services');
            $table->string('insurance');
            $table->string('licensed');
            $table->text('operatinglicense');
            $table->text('bankdetails2');
            $table->string('certification');
            $table->string('associations');
            $table->string('companystrength');
            $table->string('member');
            $table->string('clientname');
            $table->string('clientemail');
            $table->string('clientmobile');
            $table->string('clientskype')->nullable();
            $table->string('clientwhatsapp')->nullable();
            $table->string('clientposition');
            $table->string('doa');
            $table->string('clientmanager');
            $table->string('gmceo');
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
        Schema::dropIfExists('company');
    }
}
