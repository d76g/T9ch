<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile_image');
            $table->string('position');    
            $table->longtext('about');    
            $table->string('location');    
            $table->string('website')->nullable();    
            $table->string('twitter')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('instagram')->nullable();     
            $table->string('linkedin')->nullable();     
            $table->string('github')->nullable();    
            $table->timestamps();
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
        Schema::dropIfExists('profiles');
    }
};
