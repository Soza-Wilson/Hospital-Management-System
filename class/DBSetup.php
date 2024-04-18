<?php


class DBSetup
{
        use DBConnection;
        public function __construct()
        {
                $this->con = mysqli_connect($this->HOST, 'root', $this->PASSWORD, '', $this->PORT);
        }



        public function createDatabase(): bool
        {
                if ($this->con) {
                        $db = mysqli_query($this->con, "CREATE DATABASE IF NOT EXISTS bwaila_hospital_schema");
                        if ($db) {

                                try {

                                        $sql = "CREATE USER 'hms_user'@'localhost' IDENTIFIED BY 'zHe3TPmnCBH'";
                                        mysqli_query($this->con, $sql);

                                        mysqli_select_db($this->con, "bwaila_hospital_schema");

                                        $sql = "CREATE TABLE department(department_id INT PRIMARY KEY AUTO_INCREMENT,   
                    department_name TEXT,
                    description VARCHAR(300))";

                                        mysqli_query($this->con, $sql);


                                        $sql = "CREATE TABLE user_role(role_id INT PRIMARY KEY AUTO_INCREMENT, 	
                                        title TEXT,	
                                        specialty TEXT,
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
                            phone INT,
                            email VARCHAR(100),
                            password VARCHAR(100),
                            role_id INT,
                            FOREIGN KEY(role_id)REFERENCES user_role(role_id)) ";

                                        mysqli_query($this->con, $sql);


                                        $sql = "CREATE TABLE patient(patient_id INT PRIMARY KEY AUTO_INCREMENT, 
                            
                            full_name TEXT,
                            date_of_birth DATE,
                            sex TEXT,
                            registered_date DATE,
                            district TEXT,
                            village TEXT,
                            TA TEXT,
                            contact_number VARCHAR(200),
                            email VARCHAR(100),
                            user_id INT,
                            contact_address VARCHAR(400),

                            FOREIGN KEY(user_id)REFERENCES user(user_id)) ";


                                        mysqli_query($this->con, $sql);



                                        $sql = "CREATE TABLE relative(ralative_id INT PRIMARY KEY AUTO_INCREMENT, 
                            first_name TEXT,
                            last_name TEXT,
                            residence VARCHAR(300),
                            contactNumber VARCHAR(200),
                            email VARCHAR(100),
                            relation TEXT,
                            contact_address VARCHAR(400),
                            patient_id INT,

                            FOREIGN KEY(patient_id)REFERENCES patient(patient_id)) ";
                                        mysqli_query($this->con, $sql);

                                        $sql = "CREATE TABLE diagnosis(diagnosis_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                            prensent_complaint TEXT,
                            history TEXT,
                            diagnosis_name TEXT,
                            description TEXT,
                          
                            diagnosis_date DATE,
                            status TEXT,
                            patient INT,
                            doctor INT,
                            FOREIGN KEY(doctor)REFERENCES user(user_id),
                            FOREIGN KEY(patient)REFERENCES patient(patient_id)) ";


                                        mysqli_query($this->con, $sql);


                                        $sql = "CREATE TABLE lab_test(test_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                                urine_test TEXT,
                                blood_test TEXT,
                                imaging_studies TEXT,
                                diagnosis_id INT,
                                
                                FOREIGN KEY(diagnosis_id)REFERENCES diagnosis(diagnosis_id))
                                ";

                                        mysqli_query($this->con, $sql);


                                        $sql = "CREATE TABLE vitals(vitals_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                                temperature INT,
                                blood_pressure INT,
                                heart_rate INT,
                                respiratory_rate TEXT,
                                diagnosis_id INT,
                                
                                FOREIGN KEY(diagnosis_id)REFERENCES diagnosis(diagnosis_id))";

                                        mysqli_query($this->con, $sql);






                                        $sql = "CREATE TABLE treatement(treatment_id int PRIMARY KEY AUTO_INCREMENT, 
                            
                            treatment_name TEXT,
                            treatment_date date,
                            description TEXT,
                            patient INT,
                            doctor INT,
                            advice TEXT,
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

                                        $sql = "CREATE TABLE referrel(referrel_id INT PRIMARY KEY AUTO_INCREMENT, 
                                
                            referrer_name TEXT,
                            hospital_name TEXT,
                            region TEXT,
                            district TEXT,
                            area_name TEXT,
                            case_description VARCHAR(300),
                            patient_id INT,
                            documentation TEXT,
                            FOREIGN KEY(patient_id)REFERENCES patient(patient_id)) ";


                                        mysqli_query($this->con, $sql);


                                        //     Creating system admin and their department 


                                        $sql = "INSERT INTO `department`(`department_id`, `department_name`, `description`)
                     VALUES ('1','adminstration','system administration')";


                                        mysqli_query($this->con, $sql);


                                        $sql = "INSERT INTO `user_role`(`role_id`,`title`, `specialty`, `department`, `description`) 
                    VALUES ('1','admin','system adminstrator','1','Handle all adminstrative tasks')";


                                        mysqli_query($this->con, $sql);


                                        $sql = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `date_of_birth`, `sex`, `registered_date`, `contact_address`,`phone`, `email`, `password`, `role_id`) 
                    VALUES ('1','admin','admin','2222-02-22','male','2222-02-22','None','0','admin@admin.com','0000','1')";

                                        mysqli_query($this->con, $sql);


                                        return true;
                                } catch (\Throwable $th) {
                                        throw $th;
                                }
                        }
                }
        }
}
