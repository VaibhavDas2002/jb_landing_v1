<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Ensure schema exists
        DB::statement('CREATE SCHEMA IF NOT EXISTS home');

        Schema::create('home.notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->string('scheme_name')->nullable();

            $table->enum('type', [
                'important',
                'scheme_update',
                'application_status',
                'deadline',
                'event',
                'general'
            ])->default('general');

            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->json('meta')->nullable(); // app_id, deadline, links
            $table->timestamp('notified_at')->useCurrent();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home.notifications');
    }
};

