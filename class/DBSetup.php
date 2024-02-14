<?php


class DBSetup
{
    use DBConnection;
    public function __construct()
    {
        $this->con = mysqli_connect($this->HOST,'root', $this->PASSWORD,'',$this->PORT);
    }


    
    public function createDatabase():bool
    {
        if ($this->con) {
            $db= mysqli_query($this->con, "CREATE DATABASE IF NOT EXISTS bwaila_hospital_schema");
            if ($db) {

                try {
                   
                    $sql = "CREATE USER 'hms_user'@'localhost' IDENTIFIED BY 'zHe3TPmnCBH'";
                    mysqli_query($this->con, $sql);

                    mysqli_select_db($this->con, "bwaila_hospital_schema");

                    $sql = "CREATE TABLE department(department_id INT PRIMARY KEY AUTO_INCREMENT,   
                    departemnt_name TEXT,
                    description VARCHAR(300))";

                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE user_role(role_id INT PRIMARY KEY AUTO_INCREMENT, 		
                                     role_name TEXT,
                                     department INT,
                                     description VARCHAR(300),
                                     FOREIGN KEY(department)REFERENCES department(department_id))";

                    mysqli_query($this->con, $sql);

                    $sql = "CREATE TABLE user(user_id INT PRIMARY KEY AUTO_INCREMENT, 
                            first_name TEXT,
                            last_name TEXT,
                            date_of_birth DATE,
                            sex TEXT,
                            registered_date DATE,
                            contact_address VARCHAR(300),
                            email VARCHAR(100),
                            password VARCHAR(100),
                            role_id INT,
                            FOREIGN KEY(role_id)REFERENCES user_role(role_id)) ";

                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE patient(patient_id INT PRIMARY KEY AUTO_INCREMENT, 
                            
                            first_name TEXT,
                            last_name TEXT,
                            date_of_birth DATE,
                            sex TEXT,
                            registered_date DATE,
                            district TEXT,
                            village TEXT,
                            TA TEXT,
                            contactNumber VARCHAR(200),
                            email VARCHAR(100),
                            user_id INT,
                            FOREIGN KEY(user_id)REFERENCES user(user_id)) ";


                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE diagnosis(diagnosis_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                            diagnosis_name TEXT,
                            diagnosis_date DATE,
                            description TEXT,
                            patient INT,
                            doctor INT,
                            FOREIGN KEY(doctor)REFERENCES user(user_id),
                            FOREIGN KEY(patient)REFERENCES patient(patient_id)) ";


                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE treatement(treatment_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                            treatment_name TEXT,
                            treatment_date date,
                            description TEXT,
                            patient INT,
                            doctor INT,
                            FOREIGN KEY(doctor)REFERENCES user(user_id),
                            FOREIGN KEY(patient)REFERENCES patient(patient_id)) ";


                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE appointment_type(appointment_type_id INT PRIMARY KEY AUTO_INCREMENT, 
                            appointment_name TEXT,
                            description VARCHAR(300)) ";


                    mysqli_query($this->con, $sql);


                    $sql = "CREATE TABLE appointment(appointment_id int PRIMARY KEY AUTO_INCREMENT, 
                            patient INT,
                            doctor INT,
                            appointment_date DATE,
                            appointment_time TIME,
                            type INT,
                            FOREIGN KEY(doctor)REFERENCES user(user_id),
                            FOREIGN KEY(patient)REFERENCES patient(patient_id),
                            FOREIGN KEY(type)REFERENCES appointment_type(appointment_type_id)) ";


                    mysqli_query($this->con, $sql);

                    return true;
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        }
    }
}
