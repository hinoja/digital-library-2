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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("slug");
            $table->longText("description");
            $table->string("file")->nullable();
            $table->string("keywords")->nullable();
            $table->foreignId("user_id")->constrained();
            $table->string("extension")->nullable();
            $table->string("author")->nullable();
            $table->string("supervisor")->nullable();  $table->foreignId("option_id")->constrained();
            $table->foreignId("level_id")->constrained()->nullable();
            $table->foreignId("type_id")->constrained();
            $table->boolean('is_visible')->default(true);
            $table->date("published_at")->nullable();
            $table->string("github_link")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
