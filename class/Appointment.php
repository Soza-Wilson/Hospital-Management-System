<?php


class Appointment
{
    use DBConnection;
    private $appointmentID, $user, $date, $startTime,$endTime, $patient, $type;
    public function __construct($appointmentID, $user, $date, $StartTime,$endTime, $patient, $type)
    {
        $this->appointmentID = $appointmentID;
        $this->user = $user;
        $this->date = $date;
        $this->patient = $patient;
        $this->startTime = $StartTime;
        $this->endTime = $endTime;
        $this->type = $type;
    }


    public function registerAppointment(): string
    {

        try {
            //code...
            $sql = "INSERT INTO `appointment`(`appointment_id`, `patient`, `doctor`, `appointment_date`, `start_time`, `end_time`, `type`) VALUES
             ('','$this->patient','$this->user','$this->date','$this->startTime','$this->endTime','$this->type')";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "registed";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    private function sendNotification(){

        // mail();


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
