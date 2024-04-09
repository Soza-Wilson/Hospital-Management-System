<?php

class Role
{
    use DBConnection;
    private $title, $specialty, $department, $description;
    public function __construct($title, $specialty, $department, $description)
    {
        $this->title = $title;
        $this->specialty = $specialty;
        $this->department = $department;
        $this->description = $description;
        $this->con = $this->connect();
    }


    private function checkSpecialty()
    {
        try {

            $sql = "SELECT * FROM `user_role` WHERE `specialty` LIKE ? AND `department` = ? AND `title` = ? ";
            $stmt = $this->con->prepare($sql);


            $specialty = '%' . $this->specialty . '%';
            $stmt->bind_param("sss", $specialty, $this->department, $this->title);

            // Execute the query
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if any rows are returned
            if ($result->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            // Handle exceptions appropriately
            throw $th;
        }
    }

    public function addRole(): string
    {


        if ($this->checkSpecialty()) {
            return "nameExists";
        } else {
            try {
                //code...
                $sql = "INSERT INTO `user_role`(`role_id`, `title`, `specialty`, `department`, `description`) VALUES ('','$this->title','$this->specialty','$this->department','$this->description')";
                $stmt = $this->con->prepare($sql);
                if ($stmt->execute()) {
                    return 'registered';
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function getRoles(): ?object
    {

        try {
            //code...
            $sql = "SELECT * FROM `user_role` WHERE `department` = '$this->department'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getSpecialty(): ?object
    {

        try {
            //code...
            $sql = "SELECT * FROM `user_role` WHERE `department` = '$this->department' AND `title` = '$this->title'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getRoleData($roleId): ?object

    {

        // This fumction is getting role data using role ID 

        try {
            //code...
            $sql = "SELECT `role_id`, `title`, `specialty`, department.department_name, user_role.description
            FROM `user_role` INNER JOIN  department ON department.department_id = user_role.department WHERE `role_id` = '$roleId'";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getRole($userId): string
    {

        // This function is getting role using user ID  

        try {
            //code...
            $sql = "SELECT `title`, `specialty`
            FROM `user_role` INNER JOIN  user ON user.role_id= user_role.role_id WHERE user.role_id = '$userId'";
            $result = $this->con->query($sql);
            while ($row = $result->fetch_assoc()) {
                return $row['specialty'];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
