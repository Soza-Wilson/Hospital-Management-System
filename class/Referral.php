<?php

class Referral
{
    use DBConnection;
    private $referrelId, $patientId, $refereerName, $hospital, $region, $areaName, $district, $caseDescription, $documentation;

    public function __construct($referrel_id, $patient_id, $refereer_name, $hosptital, $region, $area_name, $district,$caseDescription, $documentation)
    {

        $this->referrelId = $referrel_id;
        $this->patientId = $patient_id;
        $this->refereerName = $refereer_name;
        $this->hospital = $hosptital;
        $this->region = $region;
        $this->areaName = $area_name;
        $this->district = $district;
        $this->caseDescription = $caseDescription;
        $this->documentation = $documentation;
        $this->con = $this->connect();
    }


    public function registerRefarrel(): string
    {

        try {
            //code...
            $sql = "INSERT INTO `referrel`(`referrel_id`, `referrer_name`, `hospital_name`, `region`, `district`, `area_name`, `case_description`,`documentation`,`patient_id`)
         VALUES ('','$this->refereerName','$this->hospital','$this->region','$this->district','$this->areaName','$this->caseDescription','$this->documentation','$this->patientId')";

            if ($this->con->query($sql) === TRUE) {
                return "registered";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getReferrels()
    {

        try {
            //code...
            $sql = "SELECT * FROM `referrel`";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
