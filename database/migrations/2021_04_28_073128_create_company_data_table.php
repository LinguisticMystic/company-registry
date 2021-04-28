<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDataTable extends Migration
{
    public function up(): void
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('_id');
            $table->bigInteger('regcode');
            $table->string('sepa');
            $table->string('name');
            $table->string('name_before_quotes');
            $table->string('name_in_quotes');
            $table->string('name_after_quotes');
            $table->integer('without_quotes');
            $table->string('regtype');
            $table->string('regtype_text');
            $table->string('type');
            $table->string('type_text');
            $table->string('registered')->nullable();
            $table->string('terminated')->nullable();
            $table->string('closed');
            $table->string('address');
            $table->integer('index')->nullable();
            $table->integer('addressid');
            $table->integer('region');
            $table->integer('city');
            $table->integer('atvk')->nullable();
            $table->string('reregistration_term');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_data');
    }
}
