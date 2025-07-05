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

        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cpf');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('chave_pix');
            $table->float('valor_emprestimo');
            $table->enum('status', ['denied', 'processing', 'approved'])->default('processing');
            $table->boolean('notificado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
};
