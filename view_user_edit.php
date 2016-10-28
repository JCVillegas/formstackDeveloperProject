<?php




class view_user_edit {


  function Show () {


  	$createUserForm="<form action='index.php?operation=SaveUser' method='post'>";

  	$createUserForm.="Email: <input type='text' name='Email'> </input><br>";
  	$createUserForm.="FirstName: <input type='text' name='FirstName'> </input><br>";
  	$createUserForm.="LastName: <input type='text' name='LastName'> </input><br>";
  	$createUserForm.="Password: <input type='password' name='Password'> </input><br>";
  	$createUserForm.="<input type='submit' name='CreateUser'> </input>";
  	$createUserForm.='</form>';

  	echo ($createUserForm);

  }


}

