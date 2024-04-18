<?php



class Treatment
{



    use DBConnection;
    private $treatmentId, $patientId, $doctorId, $treatmentName, $treatmentDescription, $date;

    public function __construct($treatmentId, $patientId, $doctorId, $treatmentName, $treatmentDescription)
    {
        $this->treatmentId = $treatmentId;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->treatmentName = $treatmentName;
        $this->treatmentDescription = $treatmentDescription;
        $this->date = Util::get_current_date();
        $this->con = $this->connect();
    }



    public function registerTreatment(): string
    {

        try {
            $sql = "INSERT INTO `treatement`(`treatment_id`, `treatment_name`, `treatment_date`, `description`, `patient`, `doctor`) 
            VALUES ('','$this->treatmentName','$this->date','$this->treatmentDescription','$this->patientId','$this->doctorId')";

            if ($this->con->query($sql) === TRUE) {
                return "registered";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
