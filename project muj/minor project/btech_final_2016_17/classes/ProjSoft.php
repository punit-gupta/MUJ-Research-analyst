<?php
class ProjSoft
{
	private function __construct(){ }
	
	//URI variables
	public static $BlogURL="http://www.instacomics.com";
	//Logged User Variables
	public static $LoginStatus = False;
	public static $EmpID = 0;
	public static $EmpPower=0;
	public static $EmpFirstName="";
	public static $EmpLastName="";
	public static $UserName="";
	//public static $UserID=0;
	public static $Sex="";
	public static $Desg="";


	public static $SessKey = '';
	public static $LoginError = False;
	
	//Cookie Variables
	public static $CookieExpireDuration = 57600; //16 hrs by default
	public static $CookiePath = "/"; //Avaible in whole domain
	public static $CookieDomain = ".instacomics.com"; //false; on localhost // ".instacomics.com";  //Available in whole domain
 


	public static function checkLogin()
	{
		/* Check if user has been remembered */

		if(isset($_COOKIE['instasoftwarelogin']) && isset($_COOKIE['instasoftwarepass']))
		{
			$v_login = $_SESSION['user_login'] = $_COOKIE['instasoftwarelogin'];
			$v_pass = $_SESSION['user_pass']   = $_COOKIE['instasoftwarepass'];
		}

		/* Username and userid have been set and not guest */
		if(isset($_SESSION['user_login']) && isset($_SESSION['user_pass']))
		{

			/* Confirm that username and userid are valid */

			$v_login = $_SESSION['user_login'];
			$v_pass = $_SESSION['user_pass'];
			
			if($v_login)
			{
				$query="Select emp_id, username, password, power, first_name, last_name, designation, gender from employee_details where username = '$v_login'";
				$result=mysql_query($query);
				if($row=mysql_fetch_array($result))
				{
					if(md5($row['password'])==$v_pass)
					{
						self::$LoginStatus = True;
					}
				}
			}
			
			if (self::$LoginStatus)
			{
				ini_set('session.gc_maxlifetime', 180);
				session_start();

				$_SESSION['user_login'] = $row['username'];
				$_SESSION['user_pass'] = md5($row['password']);

				header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
				setcookie("instasoftwarelogin", $_SESSION['user_login'], time()+ self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);
				setcookie("instasoftwarepass", $_SESSION['user_pass'], time()+ self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);
				
				//self::update_last_login_time($row['user_id']);

				self::$EmpID = $row['emp_id'];
				self::$EmpPower= $row['power'];
				self::$EmpFirstName= $row['first_name'];
				self::$EmpLastName= $row['last_name'];
				self::$UserName= $row['username'];
				self::$Sex= $row['gender'];
				self::$Desg= $row['designation'];
				//self::$UserID = $row['user_id'];
	}
			else
			{
				unset($_SESSION['user_login']);
				unset($_SESSION['user_pass']);
			}
		}
	}

	public static function Login($Username, $Password)
	{
		if($Username)
		{
			$query="Select emp_id, username, password, power, first_name, last_name, gender, designation from employee_details where username = '$Username'";
			

			$result=mysql_query($query);
			if($row=mysql_fetch_array($result))
			{
				if(md5($row[password])==$Password)
				{
					self::$LoginStatus = True;
				}
				else
				{
					self::$LoginError = "Wrong Password";
				}
			}
			else
			{
				self::$LoginError = "Wrong User Name";
			}
		}
		
		if (self::$LoginStatus)
		{

			self::$EmpID = $row['emp_id'];
			self::$EmpPower= $row['power'];
			self::$EmpFirstName= $row['first_name'];
			self::$EmpLastName= $row['last_name'];
			self::$UserName= $row['username'];
			self::$Sex= $row['gender'];
			self::$Desg= $row['designation'];

			ini_set('session.gc_maxlifetime', 180);
			session_start();

			$_SESSION['user_login'] = $row[username];
			$_SESSION['user_pass'] = md5($row[password]);				

			header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
			setcookie("instasoftwarelogin", $_SESSION['user_login'], time()+ self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);
			setcookie("instasoftwarepass", $_SESSION['user_pass'], time()+ self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);

		}
	}

	public static function Logout()
	{
		if(isset($_COOKIE['instasoftwarelogin']) && isset($_COOKIE['instasoftwarepass']))
		{
			header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
			setcookie("instasoftwarelogin", "", time() - self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);
			setcookie("instasoftwarepass", "", time() - self::$CookieExpireDuration, self::$CookiePath, self::$CookieDomain);
		}
		
		session_start();
		session_unset();
		session_destroy();

		self::$LoginStatus = False;
		self::$EmpID = 0;
		self::$EmpPower= 0;
		self::$EmpFirstName="";
		self::$EmpLastName="";
		self::$UserName="";
		self::$Sex="";
		self::$Desg="";

		//self::$UserID = 0;
		self::$LoginError = False;

	}

}
?>