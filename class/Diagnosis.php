<?php


class Diagnosis
{
    use DBConnection;
    private $diagnosisId, $patientId, $doctorId, $presentComplaint, $history, $diagnosisName, $diagnosisDescription, $date;

    public function __construct($diagnosisId, $patientId, $doctorId, $presentComplaint, $history, $diagnosisName, $diagnosisDescription)
    {
        $this->diagnosisId = $diagnosisId;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->presentComplaint = $presentComplaint;
        $this->history = $history;
        $this->diagnosisName = $diagnosisName;
        $this->diagnosisDescription = $diagnosisDescription;

        $this->date = Util::get_current_date();
        $this->con = $this->connect();
    }

    public function  registerDiagnosis()
    {

        try {
            //code...
            $sql = "INSERT INTO `diagnosis`(`diagnosis_id`, `prensent_complaint`, `history`, `diagnosis_name`, `description`, `diagnosis_date`, `status`, `patient`, `doctor`)
            VALUES ('','$this->presentComplaint','$this->history','$this->diagnosisName','$this->diagnosisDescription','$this->date','untreated','$this->patientId','$this->doctorId')";

            if ($this->con->query($sql) === TRUE) {
                $registerID = $this->con->insert_id;
                mysqli_close($this->con);
                return $registerID . "," . $this->patientId . "," . $this->doctorId;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getDiagnosisDetails()
    {
        try {
            //code...
            $sql = "SELECT `diagnosis_id`, `prensent_complaint`, `history`, `diagnosis_name`, `description`, `diagnosis_date`, `status`, `patient`, `doctor`,`first_name`,`last_name` FROM `diagnosis` INNER JOIN user ON user.user_id = diagnosis.doctor WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    return $row;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getPatientDiagnosisHistory()
    {

        try {
            //code...
            $sql = "SELECT `diagnosis_id`, `diagnosis_name`, `description`, `first_name`,`last_name`,`diagnosis_date` FROM `diagnosis` INNER JOIN user ON user.user_id = diagnosis.doctor WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                mysqli_close($this->con);
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getUntreatedDiagnosis()
    {

        try {
            //code...
            $sql = "SELECT patient.full_name as name,diagnosis.diagnosis_id, patient.patient_id ,`diagnosis_name`, `description`, `first_name`,`last_name`,`diagnosis_date` FROM `diagnosis` INNER JOIN user ON user.user_id = diagnosis.doctor INNER JOIN patient on patient.patient_id = diagnosis.patient WHERE diagnosis.status = 'untreated'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                mysqli_close($this->con);
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getTreatedDiagnosis()
    {

        try {
            //code...
            $sql = "SELECT patient.full_name as name,diagnosis.diagnosis_id, patient.patient_id ,`diagnosis_name`, `description`, `first_name`,`last_name`,`diagnosis_date` FROM `diagnosis` INNER JOIN user ON user.user_id = diagnosis.doctor INNER JOIN patient on patient.patient_id = diagnosis.patient WHERE diagnosis.status = 'treated'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                mysqli_close($this->con);
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateDiagnosisStatus(): bool
    {

        try {
            //code...

            $sql = "UPDATE `diagnosis` SET `status`='treated' WHERE  `diagnosis_id`='$this->diagnosisId'";
            if ($this->con->query($sql) === TRUE) {
                mysqli_close($this->con);
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
