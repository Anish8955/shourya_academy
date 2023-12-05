<?php
class UserController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
       
    }

    public function login($email, $password) {
        try {
            $query = "SELECT * FROM admin WHERE email = :email LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                
                if ($password === $user['password']) {
                    // Password is correct, set session or perform other login actions
                    // For example, set session variables:
                    session_start();
                    $_SESSION['LOGGED_IN'] = true;  
                    $_SESSION['email'] = $user['email'];
                    header('Location: admin/index.php');
                } else {
                    return false; // Incorrect password

                }
            } else {
                return false; // User not found
            }
        } catch(PDOException $e) {          
            echo 'Login Error: ' . $e->getMessage();
            return false;
        }
    }

    public function add_certificate($sno, $batch_no, $roll_no, $full_name, $parents_name , $resident_of, $date_of_issue, $designation, $place_of_issue, $training_from, $training_to ) {
        try {
            $query = 'INSERT INTO add_certificate (sno, batch_no, roll_no, full_name, parents_name, resident_of, date_of_issue, designation, place_of_issue, training_from ,training_to ) VALUES (:sno, :batch_no, :roll_no, :full_name, :parents_name, :resident_of, :date_of_issue, :designation, :place_of_issue, :training_from, :training_to )';
            $stmt = $this->db->prepare($query);

          

            $stmt->bindParam(':sno', $sno);
            $stmt->bindParam(':batch_no', $batch_no);
            $stmt->bindParam(':roll_no', $roll_no);
            $stmt->bindParam(':full_name',$full_name);
            $stmt->bindParam(':parents_name', $parents_name);
            $stmt->bindParam(':resident_of',$resident_of);
            $stmt->bindParam(':date_of_issue',$date_of_issue);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':place_of_issue',$place_of_issue);
            $stmt->bindParam(':training_from', $training_from);
            $stmt->bindParam(':training_to', $training_to);

            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo 'Registration Error: ' . $e->getMessage();
            return false;
        }
    }
    
    public function getAllUsers() {
        try {
            $query = "SELECT * FROM add_certificate"; // Modify this query based on your table name
            $stmt = $this->db->prepare($query);
            $stmt->execute();
    
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch(PDOException $e) {
            echo 'Error fetching users: ' . $e->getMessage();
            return []; // Return an empty array if an error occurs
        }
    }
    public function deleteUser($sno) {
        try {
            $query = "DELETE FROM add_certificate WHERE sno = :sno";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':sno', $sno);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Error deleting user: ' . $e->getMessage();
            return false;
        }
    }
    
    public function getUserDetails($sno) {
        try {
            $query = "SELECT * FROM add_certificate WHERE sno = :sno";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':sno', $sno);
            $stmt->execute();

            // Fetch user details as an associative array
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            return $userData;
        } catch (PDOException $e) {
            echo 'Error fetching user details: ' . $e->getMessage();
            return null;
        }
    }
    public function update_certificate($id, $sno, $batch_no, $roll_no, $full_name, $parents_name, $resident_of, $date_of_issue, $designation, $place_of_issue, $training_from, $training_to) {
        try {
            $query = 'UPDATE add_certificate SET sno = :sno, batch_no = :batch_no, roll_no = :roll_no, full_name = :full_name, parents_name = :parents_name, resident_of = :resident_of, date_of_issue = :date_of_issue, designation = :designation, place_of_issue = :place_of_issue, training_from = :training_from, training_to = :training_to WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':sno', $sno);
            $stmt->bindParam(':batch_no', $batch_no);
            $stmt->bindParam(':roll_no', $roll_no);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':parents_name', $parents_name);
            $stmt->bindParam(':resident_of', $resident_of);
            $stmt->bindParam(':date_of_issue', $date_of_issue);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':place_of_issue', $place_of_issue);
            $stmt->bindParam(':training_from', $training_from);
            $stmt->bindParam(':training_to', $training_to);
            $stmt->execute();
    
            // Check if the update was successful
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                // Update successful
                return true;
            } else {
                // No rows were affected (possibly the ID doesn't exist)
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error updating certificate details: ' . $e->getMessage();
            return false;
        }
    }    
}
?>