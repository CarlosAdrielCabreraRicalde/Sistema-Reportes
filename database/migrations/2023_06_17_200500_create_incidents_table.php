<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');
            $table->string('severity',1);

            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('project_id')->unsigned()->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects');

            $table->unsignedBigInteger('level_id')->unsigned()->nullable()->default(null);
            $table->foreign('level_id')->references('id')->on('levels');

            $table->unsignedBigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');

            $table->unsignedBigInteger('support_id')->unsigned()->nullable();
            $table->foreign('support_id')->references('id')->on('users');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
