# Formstack Developer Project

## Introduction
Framework application assignment that  creates, reads, updates and deletes users.

## Application files and brief explanation
-__index.php__ <br />
Recieves a GET operation, if it exists it calls the controller and sends the received operation, 
<br />if none is received it calls the __readUsers()__ method to display a list of users.<br>index.php requires the following classes / files :

1.__DatabaseConfig (database_config.php)__ <br />
Database configuration file.


2.__Database (database_connection.php)__ <br />
 Contains the database PDO objetcts. 


3.__ControllerUser (controller_user.php)__ <br /> 
Controls all the models and views for the operations.
Available controller methods:<br />
  *createUser()<br />
  *readUsers()<br />
  *updateUser()<br />
  *deleteUser()<br />
  *updatePassword()<br />
  *savePassword()<br />
  *confirmDeleteUser()<br />

4.__ModelUser (model_user.php)__ <br /> 
Manages the application logic.
Available model methods:<br />
  *getAllUsers()<br />
  *getUser()<br />
  *deleteUser()<br />
  *deleteUser()<br />
  *updatePassword()<br />
  *saveUser()<br />  
  
5.__ViewUserDelete (view_user_delete.php)__<br />
One method that shows a delete confirmation in html.

6.__ViewUserEdit (view_user_edit.php)__<br />
One method that shows a create or update form in html.

7.__ViewUserFooter (view_user_footer.php)__<br />
One method that shows an html footer.

8.__ViewUserHeader (view_user_header.php)__<br />
One method that shows an html header.

9.__ViewUserList (view_user_list.php)__<br />
One method that shows a list of users if they exist in html.

10.__ViewUserMessage (view_user_message.php)__<br />
One method that shows a custom message in html.

11.__ViewUserUpdatePassword (view_user_update_password.php)__<br />
One method that shows a change password form in html.

## Testing with PHPUnit
The application includes a __tests__ folder with the following classes / files:<br />
*ControllerUserTest (ControllerUserTest.php)<br />
*DatabaseConnectionTest (DatabaseConnectionTest.php)<br />
*ModelUserTest (ModelUserTest.php)<br />
*ViewUserDeleteTest(ViewUserDeleteTest.php)<br />
*ViewUserEditTest(ViewUserEditTest.php)<br /> 
*ViewUserHeaderTest(ViewUserHeaderTest.php)<br /> 
*ViewUserFooterTest(ViewUserFooterTest.php) <br /> 
*ViewUserListTest(ViewUserListTest.php) <br /> 
*ViewUserMessageTest(ViewUserMessageTest.php)<br /> 
*ViewUserUpdatePasswordTest(ViewUserUpdatePasswordTest.php)<br /> 

To run a test open a terminal and run the following line inside the application folder:<br /> 
`phpunit --whitelist whiteList.xml --coverage-text`<br />
This wil show the test results and their coverage on the terminal.



## Installation
*Followed the prerequisites from:<br />
`https://github.com/formstack/server-playbooks-devtest`

##How to use
Go to your environment and open a web browser at: `http://testbox.dev/`
and make use of the different operations:

*__CREATE__ - http://testbox.dev/?operation=CreateUser<br />
*__READ__   - http://testbox.dev?operation=ReadUsers<br />
*__UPDATE__ - http://testbox.dev?operation=ReadUsers&id=[userId]<br />
*__DELETE__ - http://testbox.dev/index.php?operation=ConfirmDeleteUser&id=[userId]<br />


## Notes
Developed in Vagrant envrionment using Ubuntu 16.04, PHP 7.0.8 and MYSQL 5.7.16.<br />
Updated vagrant's included PHPUNIT with version 5.6.2




