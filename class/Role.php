<?php

class Role
{
    use DBConnection;
    private $name, $department, $description;
    public function __construct($name, $department, $description)
    {
        $this->name = $name;
        $this->department = $department;
        $this->description = $description;
        $this->con = $this->connect();
    }


    private function checkRoleName()
    {
        try {

            $sql = "SELECT * FROM `user_role` WHERE `role_name` LIKE ? AND `department` = ?";
            $stmt = $this->con->prepare($sql);


            $name = '%' . $this->name . '%';
            $stmt->bind_param("ss", $name, $this->department);

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


        if ($this->checkRoleName()) {
            return "nameExists";
        } else {
            try {
                //code...
                $sql = "INSERT INTO `user_role`(`role_id`, `role_name`, `department`, `description`) VALUES ('','$this->name', '$this->department', '$this->description')";
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
}
