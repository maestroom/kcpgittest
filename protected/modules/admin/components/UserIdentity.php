<?php


class UserIdentity extends CUserIdentity
{
    const ERROR_USERNAME_NOT_ACTIVE = 3;
    const ERROR_LOGIN_ATTEMPT = 4;
    
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array('username'=>$this->username));
        //echo '<pre>'; print_r($user); exit();
        if($user===null) // No user found!
        { 
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }            
        elseif($user->password !== sha1 ($this->password)) // Invalid password!
        { 
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        elseif($user->status==0) // Admin Blocked user!
        { 
            $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
        }
        else // Okay!
        { 
            $this->setState('id', $user->userid);
            $this->setState('name', $user->name);  
            $this->setState('usertype', 1); 
            
            $this->errorCode=self::ERROR_NONE; 
        }              
                
        return $this->errorCode;
    }
 
}