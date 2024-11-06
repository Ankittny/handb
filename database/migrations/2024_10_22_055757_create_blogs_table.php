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
        if (Schema::hasTable('blogs')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->unsignedBigInteger('cat_id')->after('id'); // Add after ID column
                $table->string('title')->after('cat_id');
                $table->string('slug')->after('title');
                $table->text('description')->after('title');
                $table->string('image')->nullable()->after('description')->nullable();
                $table->integer('status')->default(1)->after('image');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('blogs')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn(['cat_id', 'title', 'description', 'image', 'status']);
                $table->dropTimestamps();
            });
        }
    }
};
