<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("appointment_id");
            $table->foreignId("user_id")->nullable()->constrained("users", "id")->onDelete("set null");
            $table->foreignId("doctor_id")->nullable()->constrained("users", "id")->onDelete("set null");
            $table->integer("amount");
            $table->string("payment_type");
            $table->string("appointment_for");
            $table->string("patient_name");
            $table->integer("age");
            $table->text("report_image")->nullable();
            $table->text("drug_effect");
            $table->text("patient_address");
            $table->text("phone_no");
            $table->string("date");
            $table->string("time");
            $table->tinyInteger("payment_status");
            $table->text("payment_token")->nullable();
            $table->string("appointment_status")->nullable();
            $table->text("illness_information");
            $table->text("note");
            $table->string("doctor_commission")->nullable();
            $table->string("admin_commission")->nullable();
            $table->string("cancel_reason")->nullable();
            $table->string("cancel_by")->nullable();
            $table->integer("discount_id")->nullable();
            $table->integer("discount_price")->nullable();
            $table->foreignId("hospital_id")->nullable()->constrained("hospital", "id")->onDelete("set null");
            $table->tinyInteger("is_from")->nullable();
            $table->string("zoom_url")->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
