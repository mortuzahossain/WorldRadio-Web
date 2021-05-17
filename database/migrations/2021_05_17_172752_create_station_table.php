<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateStationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('station',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->string("frequency");
            $table->string("image");
            $table->string("stream_url");
            $table->integer("streamplace_id")->references("id")->on("streamplace");
            $table->integer("country_id")->references("id")->on("country");
            $table->integer("category_id")->references("id")->on("category");
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
        Schema::drop('station');
    }

}