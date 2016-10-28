<?php




class view_user_edit {


  function Show ($userData=array()) {

  	


  	$emailValue = !empty ($userData['Email']) ? trim (substr ($userData['Email'], 0, 100)) : "";
    $firstNameValue = !empty ($userData['FirstName']) ? trim (substr ($userData['FirstName'], 0, 100)) : "";  
    $lastNameValue = !empty ($userData['LastName']) ? trim (substr ($userData['LastName'], 0, 100)) : "";      


  	$createUserForm="<form action='index.php?operation=SaveUser' method='post'>";
  	$createUserForm.="Email: <input type='text' name='Email' value='".htmlentities($emailValue)."'> </input><br>";
  	$createUserForm.="FirstName: <input type='text' name='FirstName' value='".htmlentities($firstNameValue)."'> </input><br>";
  	$createUserForm.="LastName: <input type='text' name='LastName' value='".htmlentities($lastNameValue)."'> </input><br>";
  	$createUserForm.="Password: <input type='password' name='Password'> </input><br>";
  	$createUserForm.="<input type='submit' name='CreateUser'> </input>";
  	$createUserForm.='</form>';

  	echo ($createUserForm);

  }


}

