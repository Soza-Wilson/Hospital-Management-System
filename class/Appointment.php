<?php


class Appointment
{
    use DBConnection;
    private $appointmentID, $user, $date, $time, $patient, $type;
    public function __construct($appointmentID, $user, $date, $time, $patient, $type)
    {
        $this->appointmentID = $appointmentID;
        $this->user = $user;
        $this->date = $date;
        $this->patient = $patient;
        $this->time = $time;
        $this->type = $type;
    }


    public function registerAppointment(): string
    {

        try {
            //code...
            $sql = "INSERT INTO `appointment`( `patient`, `doctor`, `appointment_date`, `appointment_time`, `type`) VALUES 
            ('$this->patient','$this->user','$this->date','$this->time','$this->type')";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "registed";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   

    public function getAppointments(): array
    {
        try {
            //code...
            $sql = "SELECT * FROM `appointment` WHERE `appointment_id`='$this->appointmentID'";
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
