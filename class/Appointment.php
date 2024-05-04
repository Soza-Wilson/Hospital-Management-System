<?php


class Appointment
{
    use DBConnection;
    private $appointmentID, $user, $date, $startTime, $endTime, $patient, $type, $Patient, $User;
    public function __construct($appointmentID, $user, $date, $StartTime, $endTime, $patient, $type)
    {
        $this->appointmentID = $appointmentID;
        $this->user = $user;
        $this->date = $date;
        $this->patient = $patient;
        $this->startTime = $StartTime;
        $this->endTime = $endTime;
        $this->type = $type;
        $this->con = $this->connect();
        $this->Patient = new Patient($this->patient, "", "", "", "", "", "", "", "", "", "");
        $this->User = new User($this->user, "", "", "", "", "", "", "", "");
    }


    public function registerAppointment(): string
    {


        try {
            //code...
            $sql = "INSERT INTO `appointment`(`appointment_id`, `patient`, `doctor`, `appointment_date`, `start_time`, `end_time`, `type`) VALUES
             ('','$this->patient','$this->user','$this->date','$this->startTime','$this->endTime','$this->type')";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "registred";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    private function sendNotification()
    {

        // mail();

    }

    private function sendPatientEmail()
    {
        $user = $this->getUser();
        $email = $this->checkIfValidEmail();
        if ($email !== "invalid" || $email !== "empty") {
            mail($email, "Appointments", "You have an appointment with" . $user["first_name"] . " " . $user["last_name"] . ", on" . Util::convert_date($this->date) . " from" . $this->startTime . " to" . $this->endTime);
        }
    }

    private function sendDoctorEmail()
    {
        $patient = $this->getPatient();
    }

    private function checkIfValidEmail()
    {


        $dataArray = $this->Patient->getPatientDetails();
        if (!empty($dataArray["email"])) {
            if (!filter_var($dataArray["email"], FILTER_VALIDATE_EMAIL)) {
                return "invalid";
            } else {
                return $dataArray["email"];
            }
        } else {
            return "empty";
        }
    }

    private function getUser()
    {
        return  $this->User->getUser();
    }

    private function getPatient()
    {
        return $this->Patient->getPatientDetails();
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
