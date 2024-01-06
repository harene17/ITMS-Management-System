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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projId');
            $table->string('projName');
            $table->string('owner');
            $table->string('PIC');
            $table->date('StartDate');
            $table->date('EndDate');
            $table ->string('Duration');
            $table->string('Methodology');
            $table->string('Platform');
            $table->string('Deployment');
            $table->foreignId('manager_id')->constrained('managers');
            $table->foreignId('leadDev_id')->constrained('lead_devs');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
