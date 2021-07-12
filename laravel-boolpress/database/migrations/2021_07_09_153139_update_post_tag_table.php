<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // $table->id();

            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")
                    ->references("id")
                    ->on("posts")
                    ->onDelete("set null");

            $table->unsignedBigInteger("tag_id");
            $table->foreign("tag_id")
                    ->references("id")
                    ->on("tags")
                    ->onDelete("set null");

            $table->primary(["post_id" , "tag_id"]);

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
        Schema::drop('post_tag', function (Blueprint $table) {
            // $table->id();

            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")
                    ->references("id")
                    ->on("posts");

            $table->unsignedBigInteger("tag_id");
            $table->foreign("tag_id")
                    ->references("id")
                    ->on("tags"); 

            $table->primary(["post_id" , "tag_id"]);

            $table->timestamps();
        });
    }
}
