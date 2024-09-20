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
        Schema::create('productions_categories', function(Blueprint $table) {
            $table->foreignIdFor(Productions::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Categories::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('expreriences_categories', function(Blueprint $table) {
            $table->foreignIdFor(Experiences::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Categories::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('productions_categories');
        Schema::dropIfExists('expreriences_categories');
    }
};
