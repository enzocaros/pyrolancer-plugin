<?php namespace Ahoy\Pyrolancer\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateWorkersTable extends Migration
{

    public function up()
    {
        Schema::create('ahoy_pyrolancer_workers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('budget_id')->unsigned()->index()->nullable();
            $table->string('business_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('website_url')->nullable();
            $table->text('description')->nullable();
            $table->text('description_html')->nullable();

            $table->boolean('has_portfolio')->default(false);

            // Location
            $table->string('address')->nullable();
            $table->string('vicinity', 100)->nullable();
            $table->string('vicinity_code', 100)->index()->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('fallback_location')->nullable();

            $table->decimal('rating_overall', 3, 2)->default(0)->nullable();
            $table->text('rating_breakdown')->nullable();

            $table->integer('count_recommend')->default(0);
            $table->integer('count_ratings')->default(0);
            $table->integer('count_bids')->default(0);
            $table->dateTime('last_digest_at')->index()->nullable();
            $table->timestamps();
        });

        Schema::create('ahoy_pyrolancer_workers_skills', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('worker_id')->unsigned();
            $table->integer('skill_id')->unsigned();
            $table->primary(['worker_id', 'skill_id'], 'worker_skill');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ahoy_pyrolancer_workers');
        Schema::dropIfExists('ahoy_pyrolancer_workers_skills');
    }

}
