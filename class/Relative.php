<?php


class Relative
{
    use DBConnection;
    private $firstName, $lastName, $residence, $contactNumber, $email, $relation, $contactAddress, $patientId;
    public function __construct($firstName, $lastName, $residence, $contactNumber, $email, $relation, $contactAddress, $patientId)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->residence = $residence;
        $this->contactNumber = $contactNumber;
        $this->email = $email;
        $this->$relation = $relation;
        $this->contactAddress = $contactAddress;
        $this->patientId = $patientId;
        $this->con = $this->connect();
    }


    public function registerRelative(): string
    {

        try {
            //code...
            $sql = "INSERT INTO `relative`(`ralative_id`, `first_name`, `last_name`, `residence`, `contactNumber`, `email`, `relation`, `contact_address`, `patient_id`)
             VALUES ('','$this->firstName','$this->lastName','$this->residence','$this->contactNumber','$this->email','$this->relation','$this->contactAddress','$this->patientId')";
            if ($this->con->query($sql) === TRUE) {
                return "registered";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
