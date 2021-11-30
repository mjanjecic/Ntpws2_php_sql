<?php
/**
 * @var Object $conn
 *
 */

include 'DB/db.inc.php';
$query = "SELECT * FROM countries;";
$country_list=mysqli_query($conn, $query);
$list_check=mysqli_num_rows($country_list);

//Fill country dropdown list for contact form
if($list_check > 0) {
    print '<select id="country" name="country">
           <option value="" selected disabled hidden>Choose country</option>';
    while ($row = $country_list->fetch_assoc()) {
        print '<option value='.$row['country_name'].">".$row['country_name']."</option>";
    }
    print '</select>';
}
