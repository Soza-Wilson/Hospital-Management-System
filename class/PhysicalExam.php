<?php



class PhysicalExam
{


    use DBConnection;
    private $name, $dir, $diagnosisId;

    public function __construct($name, $dir, $diagnosisId)
    {
        $this->name = $name;
        $this->dir = $dir;
        $this->diagnosisId = $diagnosisId;
        $this->con = $this->connect();
    }



    public  function checkIfExists(): bool
    {



        try {
            //code...
            $sql = "SELECT * FROM `physical` WHERE `diagnosis_id` = '$this->diagnosisId'";
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

    public function  registerPhysical()
    {

        try {
            //code...

            $sql = "INSERT INTO `physical`(`physical_id`, `physical_name`, `dir`, `diagnosis_id`) VALUES ('','$this->name','$this->dir','$this->diagnosisId')";
            if ($this->con->query($sql) === TRUE) {
                mysqli_close($this->con);
                return "registered";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function updatePhysical()
    {

        try {
            //code...

            $sql = "UPDATE `physical` SET `physical_name`='$this->name',`dir`='$this->dir' WHERE `diagnosis_id`='$this->diagnosisId'";
            if ($this->con->query($sql) === TRUE) {
                mysqli_close($this->con);
                return "updated";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getPhysicalExam()
    {

        try {
            //code...
            $sql = "SELECT * FROM `physical` WHERE `diagnosis_id` = '$this->diagnosisId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    return $row['physical_name'] . "," .  $row['dir']  ;
                }
            } else {
                return "empty";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
