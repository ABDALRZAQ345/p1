<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Company;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->id();
           //$table->unsignedBigInteger("user_id")->nullable();
           //$table->foreign("user_id")->references('id')->on('users')->cascadeOnDelete();
$table->foreignIdFor(User::class,'user_id')->constrained()->cascadeOnDelete();
           //$table->unsignedBigInteger("company_id")->nullable();
          //$table->foreign("company_id")->references('id')->on('companies')->cascadeOnDelete();
          $table->foreignIdFor(Company::class,'company_id')->constrained()->cascadeOnDelete();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

};
