<?php
class user {
    private $connect;

    public function __construct($host, $username, $password, $dbname) {
        $this->connect = new mysqli($host, $username, $password, $dbname);
        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }
        session_start();
    }

    public function register($username, $email, $password) {
        $username_notify = $this->validateUsername($username);
        $email_notify = $this->validateEmail($email);
        $pass_notify = $this->validatePassword($password, true);

        if (empty($username_notify) && empty($email_notify) && empty($pass_notify)) {
            if ($this->isUsernameExists($username)) {
                return "<span style='color:red;'>Username already taken. Please choose another.</span>";
            } elseif ($this->isEmailExists($email)) {
                return "<span style='color:red;'>Email already registered. Please choose another.</span>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->connect->prepare("INSERT INTO user (email, password, username, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->bind_param("sss", $email, $hashed_password, $username);
                
                if ($stmt->execute()) {
                    return "success";
                } else {
                    return "<span style='color:red;'>Could not sign up. Please try again.</span>";
                }
            }
        } else {
            return $username_notify . $email_notify . $pass_notify;
        }
    }

    public function login($username, $password) {
        $pass_notify = $this->validatePassword($password, false);

        if (empty($password)) {
            return "<span style='color:red;'>Password required!</span>";
        }

        if (!empty($pass_notify)) {
            return $pass_notify;
        }

        $stmt = $this->connect->prepare("SELECT id, password FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;

                $update_stmt = $this->connect->prepare("UPDATE user SET last_logged_at = NOW() WHERE id = ?");
                $update_stmt->bind_param("i", $id);
                $update_stmt->execute();
                $update_stmt->close();

                header("Location: profile.php");
                exit();
            } else {
                return "<span style='color:red;'>Invalid username or password.</span>";
            }
        } else {
            return "<span style='color:red;'>Invalid username or password.</span>";
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    public function getUsername() {
        return isset($_SESSION['username']) ? $_SESSION['username'] : null;
    }

    private function validateEmail($email) {
        if (empty($email)) {
            return "<span style='color:red;'>Email required!</span>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "<span style='color:red;'>Please check your email again!</span>";
        }
        return "";
    }

    private function validatePassword($password, $isRegistration) {
        if (strlen($password) < 8) {
            return "<span style='color:red;'>Password must have at least 8 characters.</span>";
        }

        if ($isRegistration) {
            if (!preg_match('/[A-Z]/', $password)) {
                return "<span style='color:red;'>Password must have at least 1 uppercase character.</span>";
            }
            if (!preg_match('/[a-z]/', $password)) {
                return "<span style='color:red;'>Password must have at least 1 lowercase character.</span>";
            }
            if (!preg_match('/[0-9]/', $password)) {
                return "<span style='color:red;'>Password must have at least 1 number.</span>";
            }
            if (!preg_match('/[\W]/', $password)) {
                return "<span style='color:red;'>Password must have at least 1 special character.</span>";
            }
        }

        return "";
    }

    private function validateUsername($username) {
        if (empty($username)) {
            return "<span style='color:red;'>Username required!</span>";
        }
        return "";
    }

    private function isUsernameExists($username) {
        $stmt = $this->connect->prepare("SELECT username FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    private function isEmailExists($email) {
        $stmt = $this->connect->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function __destruct() {
        $this->connect->close();
    }
}
?>
