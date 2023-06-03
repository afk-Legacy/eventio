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
        Schema::create('events_attendees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('attendee_id')
                  ->constrained(table: 'attendees', column: 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignId('event_id')
                  ->constrained(table: 'events', column: 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
         
                  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_attendees');
    }
};