<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Role;


class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['user_id','role_id']);
        });

        /* give admin role to default admin
        // first() возвращает экземпляр, а не коллекцию
        */
        User::where('email', env('ADMIN_EMAIL'))->first()->giveRoles(['admin']);
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
