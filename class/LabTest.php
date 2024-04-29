<?php

class LabTest
{

    use DBConnection;
    private $testId, $urineTest, $bloodTest, $imagingStudies, $diagnosisId, $con;
    public function __construct($testId, $urineTest, $bloodTest, $imagingStudies, $diagnosisId)
    {
        $this->testId = $testId;
        $this->urineTest = $urineTest;
        $this->bloodTest = $bloodTest;
        $this->imagingStudies = $imagingStudies;
        $this->diagnosisId = $diagnosisId;
        $this->con = $this->connect();
    }



    public  function checkIfExists(): bool
    {

        try {
            //code...
            $sql = "SELECT * FROM `lab_test` WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function registerLabTest()
    {

        try {
            //code...
            $sql = "INSERT INTO `lab_test`(`test_id`, `urine_test`, `blood_test`, `imaging_studies`, `diagnosis_id`) VALUES ('','$this->urineTest','$this->bloodTest','$this->imagingStudies','$this->diagnosisId')";
            if ($this->con->query($sql) === TRUE) {
                mysqli_close($this->con);
                return "registered";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function updateLabTest()
    {

        try {
            //code...

            $sql = "UPDATE `lab_test` SET `urine_test`='$this->urineTest',`blood_test`='$this->bloodTest',`imaging_studies`='$this->imagingStudies' WHERE `diagnosis_id`='$this->diagnosisId'";
            if ($this->con->query($sql) === TRUE) {
                mysqli_close($this->con);
                return "updated";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getLabTest()
    {

        try {
            //code...

            $sql = "SELECT * FROM `lab_test` WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    return $row['urine_test'] . "," .  $row['blood_test'] . "," .  $row['imaging_studies'] ;
                }
            } else {
                return "empty";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
