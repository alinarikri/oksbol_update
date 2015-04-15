<?php
//MIN

	function find_admin_by_username($user_name) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $user_name);
		
		$query  = "SELECT * ";
		$query .= "FROM administrators ";
		$query .= "WHERE user_name = '$safe_username' ";
		$query .= "LIMIT 1";
		$result = mysqli_query($connection, $query);
		//confirm_query($result);
//		if($admin = mysqli_fetch_assoc($result)) {
//			return $result;
//		} else {
//			return null;
//		}
	}

	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($user_name, $password) {
		$admin = find_admin_by_username($user_name);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

?>

