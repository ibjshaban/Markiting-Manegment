<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class CreateMarketersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketers', function (Blueprint $table) {
            $table->bigIncrements('id');
$table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
            $table->string('first_name_ar');
            $table->string('last_name_ar');
            $table->string('first_name_en');
            $table->string('last_name_en');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('mobile');
            $table->bigInteger('balance')->nullable();
            $table->integer('amount-due')->nullable();
            $table->integer('amount_paid')->nullable();
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('photo_profile')->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('marketers');
    }
}
