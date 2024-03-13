<?php

class User
{

    use DBConnection;
    private $userID, $firstName, $lastName, $dateOfBirth, $gender, $registerDate, $contactAddress, $email, $userPassword;

    public function __construct($userID, $firstName, $lastName, $dateOfBirth, $gender, $contactAddress, $email, $userPassword)
    {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->contactAddress = $contactAddress;
        $this->email = $email;
        $this->userPassword = $userPassword;
        $this->registerDate = Util::get_current_date();
        $this->con = mysqli_connect('localhost', 'root', '', 'bwaila_hospital_schema');
    }



    private function verifyUserInput()
    {
    }

    public function RegisterUser()
    {

        try {
            //code..

            $sql = "INSERT INTO `user`(`user_id`,`first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`, `email`, `password`) VALUES
                 ('','$this->firstName','$this->lastName','$this->dateOfBirth','$this->gender','$this->registerDate','$this->contactAddress','$this->email','$this->userPassword')";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                mysqli_close($this->con);
                return "registered";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function userLogIn()
    {

        try {
            //code...
            $sql = "SELECT * FROM `user` WHERE `email` = '$this->email' AND `password` = '$this->userPassword'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $_SESSION['userID'] = $row['user_id'];
                    $_SESSION['firstName'] = $row['first_name'];
                    $_SESSION['lastName'] = $row['last_name'];
                    $this->navigateUser($row['role_id']);
                }
            } else {

                header("Location:../views/error/wrong-credentials-page.php");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    private function navigateUser($role)
    {
        if (empty($role)) {
            header("Location:../views/error/unassigned-error-page.php");
        } else {
            header("Location:../views/home.php");
        }
    }


    public function updateUser(): string
    {

        try {
            //code...
            $sql = "UPDATE `user` SET `first_name`='$this->firstName',`last_name`='$this->lastName',`date_of_birth`='$this->dateOfBirth',
                `sex`='$this->gender',`registered_date`='$this->registerDate',`contact_address`='$this->contactAddress',`email`='$this->email',`password`='$this->email' WHERE `user_id`='$this->userID'";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "updated";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteUser(): string
    {

        try {
            //code...
            $sql = "DELETE FROM `user` WHERE `user_id`='$this->userID'";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                return "deleted";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getUsers(): object
    {

        try {
            //code...
            $sql = "SELECT * FROM  `user`";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getUsersDetails(): array
    {
        $sql = "SELECT 1 FROM `user` WHERE `user_id` = '$this->userID'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        }
    }
}
