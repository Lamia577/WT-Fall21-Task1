<!DOCTYPE html>

<head>

<script src="action/valid.js"></script> 

</head>

<body>

<h1>Registration Form</h1>

<p id="message"></p>
<p id="messagenew"></p>

<br>

<form action="" onsubmit="return valid()" method="POST">
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
Age: <input type="number" name="age"><br>
Designation: <input type="radio" id="junior" name="designation" value="Junior Programmer">
  <label for="junior">Junior Programmer</label>
  <input type="radio" id="senior" name="designation" value="Senior Programmer">
  <label for="senior">Senior Programmer</label>
  <input type="radio" id="projectl" name="designation" value="Project Lead">
  <label for="projectl">Project Lead</label>
  <br>
 
Preferred Language
<input type="checkbox" id="JAVA" name="JAVA" value="JAVA">JAVA
<input type="checkbox" id="PHP" name="PHP" value="PHP">PHP
<input type="checkbox" id="CPP" name="CPP" value="C++">C++
<br>
E-mail:<input type="text" name="email"><br>
Password:<input type="password" name="password"><br>
<input type="submit" value="Submit">
</body>
</html>
