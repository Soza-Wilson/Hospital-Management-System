<?php

require_once "../class/Diagnosis.php";

class Treatment
{





    use DBConnection;
    private $treatmentId, $patientId, $doctorId, $treatmentName, $treatmentDescription, $date,$advice, $diagnosisId, $diagnosis;

    public function __construct($treatmentId, $patientId, $doctorId, $treatmentName, $treatmentDescription, $diagnosisId,$advice)
    {
        $this->treatmentId = $treatmentId;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->treatmentName = $treatmentName;
        $this->treatmentDescription = $treatmentDescription;
        $this->date = Util::get_current_date();
        $this->con = $this->connect();
        $this->advice = $advice;
        $this->diagnosisId = $diagnosisId;
        $this->diagnosis = new Diagnosis($this->diagnosisId, "", "", "", "", "", "");
    }


    public function registerTreatment(): string
    {

        try {
            $sql = "INSERT INTO `treatement`(`treatment_id`, `treatment_name`, `treatment_date`, `description`, `patient`, `doctor`, `advice`) VALUES
            ('','$this->treatmentName','$this->date','$this->treatmentDescription','$this->patientId','$this->doctorId','$this->advice')";

            if ($this->con->query($sql) === TRUE) {
                if ($this->diagnosis->updateDiagnosisStatus()) {
                    return "registered";
                } else {
                    return "Error updating diagnosis status";
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
