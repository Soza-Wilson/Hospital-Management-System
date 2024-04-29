<?php

class Vitals
{

    use DBConnection;
    private $vitalsId, $temperature, $bloodPressure, $heartRate, $respiratoryRate, $diagnosisId, $con;

    public function __construct($vitalsId, $temperature, $bloodPressure, $heartRate, $respiratoryRate, $diagnosisId)
    {

        $this->vitalsId = $vitalsId;
        $this->temperature = $temperature;
        $this->bloodPressure = $bloodPressure;
        $this->heartRate = $heartRate;
        $this->respiratoryRate = $respiratoryRate;
        $this->diagnosisId = $diagnosisId;
        $this->con = $this->connect();
    }


    public  function checkIfExists():bool
    {

        

        try {
            //code...
            $sql = "SELECT * FROM `vitals` WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }

            else{
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }

       
    }
    public function registerVitals(): string
    {
        try {
            //code...
           

                $sql = "INSERT INTO `vitals`(`vitals_id`, `temperature`, `blood_pressure`, `heart_rate`, `respiratory_rate`, `diagnosis_id`) VALUES ('','$this->temperature','$this->bloodPressure','$this->heartRate','$this->respiratoryRate','$this->diagnosisId')";

                if ($this->con->query($sql) === TRUE) {
                    $registerId = $this->con->insert_id;
                    mysqli_close($this->con);
                    return "registered";
                }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getVitals()
    {

        try {
            $sql = "SELECT `vitals_id`, `temperature`, `blood_pressure`, `heart_rate`, `respiratory_rate` FROM `vitals` INNER JOIN diagnosis ON vitals.diagnosis_id = diagnosis.diagnosis_id WHERE diagnosis.diagnosis_id = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    return $row['temperature'] . "," .  $row['blood_pressure'] . "," .  $row['heart_rate'] . "," .  $row['respiratory_rate']. "," .  $row['vitals_id'];
                }
            } else {
                return "empty";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateVitals()
    {

        try {
            //code...

            $sql = "UPDATE `vitals` SET `temperature`='$this->temperature',`blood_pressure`='$this->bloodPressure',`heart_rate`='$this->heartRate',`respiratory_rate`='$this->respiratoryRate'
             WHERE `diagnosis_id`='$this->diagnosisId'";
            if ($this->con->query($sql) === TRUE) {
                return "updated";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
