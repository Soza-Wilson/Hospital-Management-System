<?php

class User
{

    use DBConnection;
    private $userID, $firstName, $lastName, $dateOfBirth, $gender, $registerDate, $contactAddress, $phone, $email, $userPassword;

    public function __construct($userID, $firstName, $lastName, $dateOfBirth, $gender, $contactAddress, $phone, $email, $userPassword)
    {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->contactAddress = $contactAddress;
        $this->email = $email;
        $this->phone = $phone;
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

            $sql = "INSERT INTO `user`(`user_id`,`first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`,`phone`, `email`, `password`) VALUES
                 ('','$this->firstName','$this->lastName','$this->dateOfBirth','$this->gender','$this->registerDate','$this->contactAddress','$this->phone','$this->email','$this->userPassword')";
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
                    session_start();
                    $_SESSION['user'] = $row['user_id'];
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



    public function getActiveUsers(): object
    {

        try {
            //code...
            $sql = "SELECT `user_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`, `email`, `password`, `specialty`,`department_name`,user.role_id FROM `user`
             INNER JOIN `user_role` ON user_role.role_id = user.role_id INNER JOIN `department` ON department.department_id = user_role.department";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDoctor(): object
    {

        try {
            //code...
            $sql = "SELECT `user_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`, `email`, `password`, `specialty`,`department_name`,user.role_id FROM `user`
             INNER JOIN `user_role` ON user_role.role_id = user.role_id INNER JOIN `department` ON department.department_id = user_role.department WHERE user_role.title = 'doctor' OR user_role.title = 'nurse'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getInactiveUsers()
    {

        try {
            //code...
            $sql = "SELECT * FROM  `user` WHERE `role_id` is NULL";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getUser(): array
    {

        try {
            //code...
            $sql = "SELECT `user_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`, `email`, `password`, user_role.specialty as role, department.department_name as department 
            FROM `user` INNER JOIN user_role ON user.user_id = user_role.role_id LEFT JOIN department ON user_role.department = department.department_id WHERE `user_id` = '$this->userID' ";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    return $row;
                }
                mysqli_close($this->con);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getInactiveUserDetails(): array
    {

        try {
            $sql = "SELECT * FROM `user` WHERE `user_id` = '$this->userID'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    return $row;
                }
                mysqli_close($this->con);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setUserRole($userId, $roleId): string
    {

        try {
            //code...
            $sql = "UPDATE `user` SET `role_id` = '$roleId' WHERE `user_id` = '$userId'";
            $statement = $this->con->prepare($sql);
            if ($statement->execute()) {
                mysqli_close($this->con);
                return "updated";
            };
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
