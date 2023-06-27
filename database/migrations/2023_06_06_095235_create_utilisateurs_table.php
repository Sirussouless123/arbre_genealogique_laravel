<?php

use App\Models\Typemembre;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->text('f_name');
            $table->text('l_name');
            $table->text('mail');
            $table->date('birth_date');
            $table->text('birth_city');
            $table->text('pwd');
            $table->integer('code');
            $table->foreignIdFor(Typemembre::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
