<?php


class Department
{
    use DBConnection;
    private $name, $description;


    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->con = $this->connect();
    }

    private function checkIfNameExists(): bool
    {
        try {

            $sql = "SELECT * FROM `department` WHERE `department_name` LIKE ?";
            $stmt = $this->con->prepare($sql);


            $name = '%' . $this->name . '%';
            $stmt->bind_param("s", $name);

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

    public function registerDepartment(): string
    {

        if ($this->checkIfNameExists()) {
            return "nameExists";
        } else {

            try {
                //code...
                $sql = "INSERT INTO `department`(`department_id`, `department_name`, `description`) VALUES ('','$this->name','$this->description')";
                $statement = $this->con->prepare($sql);
                if ($statement->execute()) {
                    return "registered";
                };
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function getDepartments(): object
    {

        try {
            //code...
            $sql = "SELECT * FROM  `department`";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDepartment($id): object
    {
        
        try {
            //code...
            $sql = "SELECT `department_id`, `department_name`, `description` FROM `department` WHERE `department_id` = $id";
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
