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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
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
        Schema::dropIfExists('permissions');
    }
};


// INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (NULL, 'Create user', 'create', NOW(), NOW());
// INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (NULL, 'View user', 'view', NOW(), NOW());
// INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (NULL, 'Update user', 'update', NOW(), NOW());
// INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (NULL, 'Delete user', 'delete', NOW(), NOW());