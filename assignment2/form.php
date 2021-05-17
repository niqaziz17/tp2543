<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="insert.php">
  Nama :
  <input type="text" name="name" size="40" required>
  <br>
  Email :
  <input type="text" name="email" size="25" required>
  <br>
  How do you find me?
  <select name="find" id="find">
    <option value="From a friend">From a friend</option>
    <option value="I googled you">I googled you</option>
    <option value="Just surf on in">Just surf on in</option>
    <option value="From your Facebook">From your Facebook</option>
    <option value="I clicked an ads">I clicked an ads</option>
  </select><br>

  I like your: <br>
    <input type="checkbox" id="page" name="page" value="page">
      <label for="page">Front Page</label><br>
    <input type="checkbox" id="form" name="form" value="form">
      <label for="form">Form</label><br>
    <input type="checkbox" id="ui" name="ui" value="ui">
      <label for="ui">User Interface</label><br>


  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required></textarea>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>