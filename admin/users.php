<?php
/**
 * @var Object $conn
 */

require 'DB/db.inc.php';


#Update user
if(isset($_POST['edit'])) {
    $countryCodeQuery = mysqli_query($conn, "SELECT * FROM countries WHERE country_name='".$_POST['country']."';");
    $row = mysqli_fetch_array($countryCodeQuery);
    print $_POST['role'];
    $query = "UPDATE users SET
    full_name='".$_POST['full_name']."', 
    email='".$_POST['email']."', 
    country_id='".$row['country_code']."', 
    role='".$_POST['role']."', 
    birth_date='".$_POST['birth_date']."'
    WHERE id=".$_POST['user_id'].";
    ";
    mysqli_query($conn, $query);
    header("location: index.php?menu=adminUsers&id=".$_POST['user_id']."");
}

#Delete user
else if(isset($_GET['delete'])) {
    mysqli_query($conn, "DELETE FROM users WHERE id = ".$_GET['id']." ;");
    header("location: index.php?menu=adminUsers");
}

#Edit user
else if(isset($_GET['id'])) {
    $query=mysqli_query($conn, "SELECT * FROM users WHERE id = ".$_GET['id']." ;");
    if (mysqli_num_rows($query)!=0) {

    $row = mysqli_fetch_assoc($query);
    }
        print'<form method="post" action="">
        <input type="hidden" id="edit" name="edit" value="true">
        <input type="hidden" id="user_id" name="user_id" value="'.$row['id'].'">
        <label name="username" for="username">Username: '.$row['username'].'</label>
        <label name="full_name" for="full_name">Full name</label>
        <input type="text" name="full_name" id="full_name" required placeholder="John Doe" value="'.$row['full_name'].'">
        <label name="email" for="email">Email</label>
        <input type="email" name="email" id="email" required value="'.$row['email'].'">
        <label name="country" for="country">Country</label>';

    $countryQuery = "SELECT * FROM countries;";
    $country_list=mysqli_query($conn, $countryQuery);
    $list_check=mysqli_num_rows($country_list);
    if($list_check > 0) {
        print '<select id="country" name="country">';
        while ($country = $country_list->fetch_assoc()) {
            if (strtolower($country['country_code']) == strtolower($row['country_id'])) {
                print '<option selected value=' . $country['country_name'] . "> ". $country['country_name'] ."</option>";
            } else {
                print '<option value=' . $country['country_name'] . ">" . $country['country_name'] . "</option>";
            }
        }
        print '</select>';
    }
        print '
        <label name="birth_date" for="birth_date">Birth Date</label>
        <input type="date" name="birth_date" id="birth_date" required value="'.$row['birth_date'].'"> 
        <label name="role" for="role">Current Role: '.$row['role'].'</label>
        <label name="role" for="role">New Role</label>
        <select id="role" name="role">
            <option>NONE</option>
            <option>ADMIN</option>
            <option>EDITOR</option>
            <option>USER</option>
        </select>
        <button type="submit" name="submit">SUBMIT</button>
        </form>
        ';
}
else {


#Show all users
$allUsers=mysqli_query($conn, "SELECT * FROM users WHERE username != ".$_SESSION['user']['username']." ;");

if (isset($_GET['error'])) {
    if ($_GET['error'] == "updateError") {
        print '<p style="color: red">Could not update users!</p>';
    }
}

if (mysqli_num_rows($allUsers)!=0) {
    print '<table>
        <tr style="border: 1px solid black">
        <th>Username</th>
        <th>Full name</th>
        <th>E-mail</th>
        <th>Role</th>
        </tr>
       ';
    while ($row = mysqli_fetch_assoc($allUsers)) {
        $id = $row['id'];
        print '<tr>
        <td>'.$row['username'].'</td>
        <td>'.$row['full_name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['role'].'</td>
        <td><a href="index.php?menu=adminUsers&id='.$id.'">EDIT</a></td>
        <td><a href="index.php?menu=adminUsers&delete=true&id='.$id.'" style="background: #6c0000">DELETE</a></td>
        </tr>';
    }

    print '</table>
    ';
}
else {
    print "There are no other users.";
}


}

