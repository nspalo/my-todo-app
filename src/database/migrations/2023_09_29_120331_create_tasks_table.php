<?php

declare(strict_types=1);

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $allowedStatus =  TaskStatusEnum::names();

        Schema::create('tasks', static function (Blueprint $table) use ($allowedStatus) {
            $table->id();
            $table->string('title');
            $table->enum('status', $allowedStatus)->default(TaskStatusEnum::CREATED->name);
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }
}
