<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('source_id')->unsigned();// Id da tabela categories
            $table->foreign('source_id')->references('id')->on('sources'); // Define o campo como chave extrangeira (foreign key)
         
            $table->string('author', 100)->nullable(); // Nome do Produto
            $table->string('title', 400)->nullable(); // Imagem do Produto
            $table->text('description')->nullable(); // Descrição do produto
            $table->string('url', 100)->nullable(); // Descrição do produto
            $table->string('urlToImage', 100)->nullable(); // Descrição do produto
            $table->text('publishedAt')->nullable(); // Descrição do produto
            $table->text('content')->nullable(); // Descrição do produto
           

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
        Schema::dropIfExists('articles');
    }
}
