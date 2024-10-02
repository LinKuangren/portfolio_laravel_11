<?php

use App\Models\Categories;
use App\Models\Experiences;
use App\Models\Productions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('categories_productions', function(Blueprint $table) {
            $table->foreignIdFor(Productions::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Categories::class)->constrained()->cascadeOnDelete();
            $table->primary(['productions_id', 'categories_id']);
        });
        Schema::create('categories_expreriences', function(Blueprint $table) {
            $table->foreignIdFor(Experiences::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Categories::class)->constrained()->cascadeOnDelete();
            $table->primary(['experiences_id', 'categories_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categories_productions');
        Schema::dropIfExists('categories_expreriences');
    }
};
