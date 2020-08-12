<?php
include "connection.php";
include "session.php";
class user
{
    public $db;
    public function __construct()
    {
        $this->db=new connection();
    }
    public function registration($data)
    {
        $username  = $data['username'];
        $email     = $data['email'];
        $password  = $data['password'];
        $check_mail= $this->mailCheck($email); 
        if($email == "" or $username == "" or $password == "")
        {
            $msg = "<div class='alert alert-danger'><strong>Any of the field should not be empty.</strong></div>";
            return $msg;
        }
        if(strlen($username)<3)
        {
            $msg = "<div class='alert alert-danger'><strong>Username should be of length greater than three.</strong></div>";
            return $msg;
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $msg = "<div class='alert alert-danger'><strong>Invalid Email.</strong></div>";
            return $msg;            
        }
        if(preg_match('/[^a-zA-Z0-9_-]/i',$username))
        {
            $msg="<div class='alert alert-danger'><strong>User name only contain Alphanuumerical,Underscrore,Dashes!</strong></div>";
            return $msg;            
        }
        if(strlen($password)<6)
        {
            $msg = "<div class='alert alert-danger'><strong>Password should be of length greater than six.</strong></div>";
            return $msg;
        } 
        if($check_mail==true)
        {
            $msg = "<div class='alert alert-danger'><strong>Duplicate email.</strong></div>";
            return $msg;
        }
        else
        {
            $pass = md5($data['password']);
            $sql="insert into registration(username,email,password) values(:username,:email,:password)";
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':username',$username);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':password',$pass);
            $result = $stmt->execute();
            if($result)
            {
                $msg="<div class='alert alert-success'><strong>Registration Successfull.ThankYou</strong></div>";
                return $msg;
            }
            else
            {
                 $msg="<div class='alert alert-success'><strong>Registration unsuccessfull.Something wrong.</strong></div>";
                return $msg;

            }

        }

    }
    public function mailCheck($email)
    {
        $sql    = "select email from registration where email=:email";
        $stmt   = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
        
        
    }
	public function insert($query,$img)
    {
    $img = $img;
	$stmt = $this->db->pdo->prepare($query);
    $stmt->bindValue('v',$img);
    $result = $stmt->execute();
	if($result){
		return $result;
		exit();
	} else {
		return false;
	}
    }
    public function images($sql)
    {
	$stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

    public function select()
    {
        $sql  ="select * from registration;";
        $stmt =$this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function adminLogin($data)
    {
        $username    = $data['username'];
        $pass     =     $data['password'];
        if($username == "" or $pass == "")
        {
            $msg="<div class='alert alert-danger'><strong>Any of the field should not be empty!</strong></div>";
            return $msg;
        }
        $result=$this->login($username,$pass);
        if($result)
        {
            session::init();
            session::set('login',true);
            session::set('id',$result->id);
            session::set('username',$result->username);
            session::set('password',$result->password);
            session::set('loginmsg',"<div class='alert alert-success'><strong>Login Successfull</strong></div>");
            header("location:adminlogin.php");

        }
        else
        {
            $msg="<div class='alert alert-danger'><strong>Data Not found</strong></div>";
            return $msg;
        }

    }
    public function login($username,$pass)
    {
        $sql = "select * from admin where username = :username and password = :password";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$pass);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function delete($id)
    {
    $sql  = "delete from registration where id = :id";
    $stmt = $stmt =$this->db->pdo->prepare($sql);
    $stmt->bindParam(':id',$id); 
    if($stmt->execute()){
    $msg="<div class='alert alert-danger text-center'><strong>Data Deleted success fully!</strong></div>";
	echo $msg;
	header("location:adminlogin.php");
	
    }
    }
    public function userLogin($data)
    {
        $email    = $data['email'];
        $pass     =    md5($data['password']);
        if($email == "" or $pass == "")
        {
            $msg="<div class='alert alert-danger'><strong>Any of the field should not be empty!</strong></div>";
            return $msg;
        }
        $result=$this->loginuser($email,$pass);
        if($result)
        {
            session::init();
            session::set('login',true);
            session::set('id',$result->id);
            session::set('username',$result->username);
            session::set('email',$result->email);
            session::set('password',$result->password);
            session::set('loginmsg',"<div class='alert alert-success'><strong>Login Successfull</strong></div>");
            header("location:profile.php");

        }
        else
        {
            $msg="<div class='alert alert-danger'><strong>Data Not found</strong></div>";
            return $msg;
        }

    }
    public function loginuser($email,$pass)
    {
        $sql = "select * from registration where email = :email and password = :password";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':password',$pass);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function getDataById($userid)
    {
        $sql = "select * from registration where id=:id";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->bindValue(':id',$userid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function userUpdate($userid,$data)
    {
        $username = $data['username'];
        $email    = $data['email'];
        if($username == "" or $email == "")
        {
            $msg="<div class='alert alert-danger'><strong>Any of the field should not be empty!</strong></div>";
            return $msg;
        }
        elseif(strlen($username)<3)
        {
           $msg="<div class='alert alert-danger'><strong>Invalid Username!</strong></div>";
            return $msg;
        }
        elseif(preg_match('/[^a-zA-Z0-9_-]/i',$username))
        {
            $msg="<div class='alert alert-danger'><strong>User name only contain Alphanuumerical,Underscrore,Dashes!</strong></div>";
            return $msg;
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $msg="<div class='alert alert-danger'><strong>Invalid Email</strong></div>";
            return $msg;
        }
        else{
            $sql="update  registration set
            username   =:username,
            email      =:email
            where id    =:id;";
            $stmt= $this->db->pdo->prepare($sql);
            $stmt->bindValue(':username',$username);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':id',$userid);
            $result = $stmt->execute();
            if($result)
            {
                $msg="<div class='alert alert-success'><strong> updated Successfull.ThankYou</strong></div>";
                return $msg;
            }
            else
            {
                 $msg="<div class='alert alert-success'><strong>Update unsuccessfull.Something wrong.</strong></div>";
                return $msg;

            }
        }
    }
    public function checkPass($old,$id)
    {
        $pass=md5($old);
        $sql = "select password from registration where password = :pass and id=:id";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->bindValue(':pass',$pass);
        $stmt->bindValue(':id',$id);
        $stmt->execute();

        if($stmt->rowCount()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function userPassword($userid,$data)
    {
        $old     = $data['old'];
        $new = $data['new'];
        if($old==""or $new == "")
        {
            $msg="<div class='alert alert-danger'><strong>Any of the field should not be empty!</strong></div>";
            return $msg;
        }
        elseif(strlen($data['new']) < 6)
        {
           $msg="<div class='alert alert-danger'><strong>Password Should be of length greater than 6!</strong></div>";
            return $msg;
        }
        $chk_pass=$this->checkPass($old,$userid);
        if(!$chk_pass)
        {
            $msg="<div class='alert alert-danger'><strong>Password Not Exists..</strong></div>";
            return $msg;
        }
        $password = md5($new);
        $sql="update  registration
        set
        password        =:pass
        where id    =:id;";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->bindValue(':pass',$password);
        $stmt->bindValue(':id',$userid);
        $result = $stmt->execute();
            if($result)
            {
                $msg="<div class='alert alert-success'><strong>Password updated Successfull.ThankYou</strong></div>";
                return $msg;
            }
            else
            {
                 $msg="<div class='alert alert-success'><strong>Update unsuccessfull.Something wrong.</strong></div>";
                return $msg;

            }

    }

}


?>
