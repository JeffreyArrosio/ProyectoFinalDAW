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
        Schema::create('users', function (Blueprint $table) {
            $images = [
                "https://i.pinimg.com/1200x/dc/8a/57/dc8a57bd8fbedd276aa12de590b81a80.jpg",
                'https://i.pinimg.com/736x/22/78/cb/2278cb9755e65d7efd3f03e965b78ac5.jpg',
                "https://i.pinimg.com/736x/99/0d/16/990d16b9392d430e1d7b89eb8792bc3a.jpg",
                "https://i.pinimg.com/736x/f1/4d/d3/f14dd30afa5712fe213eecbdb41df70e.jpg",
                "https://i.pinimg.com/736x/00/58/69/0058693e87c9e00b8e321fcddd857dac.jpg",
                "https://i.pinimg.com/736x/e4/3d/3d/e43d3db9721b95c316611aa7ac5460c6.jpg",
                "https://i.pinimg.com/736x/2b/eb/48/2beb486e56bb6d556894ab42161b62bf.jpg",
                "https://i.pinimg.com/736x/2e/33/14/2e331479df3d019b7a91c94ce4a28c46.jpg",
                "https://i.pinimg.com/736x/e3/17/95/e3179580ccc5a5a6cdd24fa322991437.jpg"
            ];
            $randImg = $images[array_rand($images)];
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img')->default($randImg);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
