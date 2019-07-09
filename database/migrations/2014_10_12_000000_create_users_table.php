<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->index()->unsigned()->default(1);
            $table->integer('is_active')->default(1);
            $table->integer('provider_id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('azure_id', 36)->nullable();
            $table->string('api_token')->nullable();
            $table->string('appRoles')->nullable();
            $table->string('allowedMemberTypes')->nullable();
            $table->string('displayName')->nullable();
            $table->string('givenName')->nullable();
            $table->string('mobilePhone')->nullable();
            $table->integer('photo_id')->nullable();
            $table->rememberToken();
            $table->timestamp('password_changed_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
