<?php


class Patient
{
    use DBConnection;
    private $patientID, $firstName, $lastName, $dateOfBirth, $gender, $registerDate, $district, $village, $TA, $contactNumber, $email, $user;

    public function __construct($patientID, $firstName, $lastName, $dateOfBirth, $gender, $district, $village, $TA, $contactNumber, $email, $user)
    {

        $this->patientID = $patientID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->district = $district;
        $this->village = $village;
        $this->TA = $TA;
        $this->contactNumber = $contactNumber;
        $this->email = $email;
        $this->registerDate = Util::get_current_date();
        $this->user = $user;
        $this->con = mysqli_connect('localhost', 'root', '', 'bwaila_hospital_schema');
    }


    public function registerPatient(): string
    {


        try {
            //code... 
            $sql = "INSERT INTO `patient`(`patient_id`,`first_name`, `last_name`, `date_of_birth`,`sex`, `registered_date`, `district`, `village`, `TA`, `contactNumber`, `email`)
             VALUES ('','$this->firstName','$this->lastName' ,'$this->dateOfBirth','$this->gender','$this->registerDate','$this->district','$this->village','$this->TA','$this->contactNumber','$this->email')";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "registed";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function updatePatient(): string
    {

        try {
            //code...
            $sql = "UPDATE `patient` SET `first_name`='$this->firstName',`last_name`='$this->lastName',`date_of_birth`='$this->lastName',`sex`='$this->gender',`registered_date`='$this->registerDate',
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

    public function getPatients(): object
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
}
