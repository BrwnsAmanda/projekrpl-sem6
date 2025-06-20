<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('rujukans', function (Blueprint $table) {
        if (!Schema::hasColumn('rujukans', 'user_id')){
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
}
});
}

public function down()
{
    Schema::table('rujukans', function (Blueprint $table) {
        if (Schema::hasColumn('rujukans','user_id')){
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        }
    });
}

};
