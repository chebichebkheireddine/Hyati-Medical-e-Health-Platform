<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patientId");
            $table->string('medicalHistory');
            $table->string('familyHistory');
            $table->double('height');
            $table->double('weight');
            $table->string('bloodType');
            $table->double('diastolicBloodPressure');
            $table->double('systolicBloodPressure');
            $table->string('allergies');
            $table->timestamp('lastUpdateDate');
            $table->boolean('vitality');
            $table->timestamps();
        });
        Schema::create('familyMembers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memberType');
            $table->foreignId('patientId');
            $table->foreignId('memberHealthId')->nullable();
            
        });
        Schema::create('Typefamilys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('emergencyContacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId');
            $table->string('name');
            $table->string('phoneNumber');
            $table->timestamps();
        });
        Schema::create('consultationRecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId');
            $table->foreignId('professionalId');
            $table->string('complaints');
            $table->string('physicalExamination');
            $table->string('diagnosis');
            $table->timestamp('date');
            $table->timestamps();
        });
        // This is for  consultation records
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professionalId');
            $table->foreignId('phareId');
            $table->foreignId('patientId');
            $table->foreignId('drugId');
            $table->foreignId('consultationId');
            $table->double('dosage');
            $table->integer('frequency');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('labrecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultationId');
            $table->foreignId('professionalId');
            $table->foreignId('patientId');

            $table->string('testName');
            $table->string('testResult');
            $table->string('testUnit');
            $table->string('testRange');
            $table->date('testDate');
            $table->timestamps();
        });
        Schema::create('radiologyrecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultationId');
            $table->foreignId('professionalId');
            $table->foreignId('patientId');
            $table->string('imagingName');
            $table->string('testResult');
            $table->date('testDate');
            $table->timestamps();
        });
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultationId');
            $table->foreignId('professionalId');
            $table->foreignId('patientId');
            $table->foreignId('drugId');
            $table->foreignId('administrationSite');
            $table->integer('vaccineDose');
            $table->string('vaccineType');
            $table->string('batch');
            $table->string('SerialNumber');
            $table->string('sideEffect');
            $table->date('vaccinationDate');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('currentMedications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId');
            $table->foreignId('drugId');
            $table->double('dosage');
            $table->integer('frequency');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('drugName');
            $table->string('drugType');
            $table->string('drugDescription');
            $table->string('drugCategory');
            $table->string('drugForm');
            $table->string('drugRoute');
            $table->string('drugStrength');
            $table->string('drugUnit');
            $table->string('drugFrequency');
            $table->string('drugDuration');
            $table->string('drugIndication');
            $table->string('drugContraindication');
            $table->string('drugSideEffect');
            $table->string('drugWarning');
            $table->string('drugInteraction');
            $table->string('drugStorage');
            $table->string('drugPrice');
            $table->string('drugImage');
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
        Schema::dropIfExists('general_medical_records');
        Schema::dropIfExists('familyMembers');
        Schema::dropIfExists('emergencyContacts');
        Schema::dropIfExists('consultationRecords');
        Schema::dropIfExists('medications');
        Schema::dropIfExists('labrecords');
        Schema::dropIfExists('radiologyrecords');
        Schema::dropIfExists('vaccinations');
        Schema::dropIfExists('currentMedications');
        Schema::dropIfExists('drugs');
        Schema::dropIfExists('Typefamilys');
    }
}