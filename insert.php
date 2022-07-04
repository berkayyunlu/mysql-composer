<form action="datamodel.php" method="POST">

    <input type="text" name="full_name" placeholder="Enter your fullname" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="text" name="age" placeholder="Enter your age" required>
    <input type="text" name="address" placeholder="Enter your address" required>
    <input type="text" name="phone" placeholder="Enter your phone" required>
    <label>Choose User Type:</label>
    <select name="user_type_id" required>
        <option value='1'>admin</option>
        <option value='2'>user</option>
    </select>

    <button type="submit" name="insert">Add</button>



</form>