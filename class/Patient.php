<?php


class Patient
{
    use DBConnection;
    private $patientID, $fullName, $dateOfBirth, $gender, $registerDate, $district, $village, $TA, $contactNumber, $email, $user, $contactAddress;

    public function __construct($patientID, $fullName, $dateOfBirth, $gender, $district, $village, $TA, $contactNumber, $email, $user, $contactAddress)
    {

        $this->patientID = $patientID;
        $this->fullName = $fullName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->district = $district;
        $this->village = $village;
        $this->TA = $TA;
        $this->contactNumber = $contactNumber;
        $this->email = $email;
        $this->registerDate = Util::get_current_date();
        $this->user = $user;
        $this->contactAddress = $contactAddress;
        $this->con = $this->connect();
    }


    public function registerPatient(): string
    {


        try {
            //code... 
            $sql = "INSERT INTO `patient`(`patient_id`, `full_name`, `date_of_birth`, `sex`, `registered_date`, `district`, `village`, `TA`, `contact_number`, `email`, `user_id`, `contact_address`)
             VALUES ('','$this->fullName','$this->dateOfBirth','$this->gender','$this->registerDate','$this->district','$this->village','$this->TA','$this->contactNumber','$this->email','$this->user','$this->contactAddress')";
            if ($this->con->query($sql) === TRUE) {
                return $this->con->insert_id;
                $this->con->close();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function updatePatient(): string
    {

        try {
            //code...
            $sql = "UPDATE `patient` SET `full_name`='$this->fullName',`date_of_birth`='$this->dateOfBirth',`sex`='$this->gender',`registered_date`='$this->registerDate',
                `district`='$this->district',`village`='$this->village',`TA`='$this->TA',`contactNumber`='$this->contactNumber',`email`='$this->email',`user_id`='$this->user' WHERE `patient_id`='$this->patientID'";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "updated";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deletePatient(): string

    {
        try {
            //code...
            $sql = "DELETE FROM `patient` WHERE 0";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "deleted";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getPatients()
    {

        try {
            //code...
            $sql = "SELECT * FROM `patient`";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


 
    public function getPatientDetails(): array
    {

        try {

            $sql = "SELECT * FROM `patient` WHERE `patient_id` = $this->patientID";
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

    public function searchPatientByName($patientName):object
    {

        try {

            $sql = "SELECT * FROM `patient` WHERE `full_name` LIKE '%$patientName%'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
