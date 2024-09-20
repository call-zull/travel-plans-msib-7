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
        Schema::table('budget_plans', function (Blueprint $table) {
            // remove budget_plans_travel_plan_id_foreign
            $table->dropForeign('budget_plans_travel_plan_id_foreign');

            // add new foreign key
            $table->foreign('travel_plan_id')->on('travel_plans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
