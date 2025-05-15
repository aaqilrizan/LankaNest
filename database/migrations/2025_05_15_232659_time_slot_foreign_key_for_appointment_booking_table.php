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
        Schema::table('appointment_bookings', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['time_slot_id']);

            // Add the new foreign key constraint
            $table->foreign('time_slot_id')
                ->references('id')
                ->on('property_time_slots')
                ->onDelete('cascade');
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
