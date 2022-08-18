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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('editorial_id')->nullable()->constrained();
            $table->foreignId('language_id')->nullable()->constrained();
            $table->string('isbn', 20);
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.00)->unsigned();
            $table->decimal('promotional_price', 10, 2)->default(0.00)->unsigned();
            $table->enum('condition', ['new', 'useded'])->default('new');
            $table->integer('year')->default(0)->unsigned();
            $table->integer('pages')->default(0)->unsigned();
            $table->integer('stock')->default(0)->unsigned();
            $table->date('publication_date')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('books');
    }
};
