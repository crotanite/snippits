<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->nullable();
            $table->longText('snippet');
            $table->string('language');
            $table->string('theme');
            $table->json('tags')->nullable();
            $table->string('direct_url')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('anonymous')->default(false);
            $table->timestamps();

            $table->foreign('language')->references('key')->on('languages');
            $table->foreign('theme')->references('key')->on('themes');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snippets');
    }
}
