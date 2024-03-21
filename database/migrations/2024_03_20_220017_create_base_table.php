<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nomor_telpon');
            $table->string('foto')->nullable();
            $table->text('bio')->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
        });

        Schema::create('topik_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('topiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('topik_kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('slug');
            /**
             * status 0 = block
             * status 1 = publish
             * status 2 = draft
             * status 3 = pending
             */
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('saveds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('topic_id')->constrained('topiks')->onDelete('cascade');
            $table->timestamps();
        });

        DB::getQueryLog();

        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('topic_id')->nullable()->constrained('topiks')->onDelete('cascade');
            $table->bigInteger('parent_id')->nullable();
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('table_id');
            $table->string('table_name')->nullable();
            $table->string('reason');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('role');
        });

        Schema::table('responses', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('content');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('topiks');
        Schema::dropIfExists('saveds');
        Schema::dropIfExists('responses');
        Schema::dropIfExists('topik_kategoris');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('messages');
    }
}
