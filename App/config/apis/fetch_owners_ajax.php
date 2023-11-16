<?php

session_start();

include_once '../connection.php';
include_once '../globals.php';

$res = '';

$fetch_sql = "SELECT * from users";

if ($result = $conn->query($fetch_sql)) {
    $count = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $phone = $row['phone'];
            $email = $row['email'];
            
            global $res; 

            $res .= "<tr class=\"data flex-sb-aic\">
            <td class=\"column5 count btn\"><span>$count</span><span class=\"cell_info\"></span></td>
            <td class=\"column1\"><span class=\"label\">First Name</span><span class=\"cell_info\">$fname</span></td>
            <td class=\"column2\"><span class=\"label\">Last Name</span><span class=\"cell_info\">$lname</span></td>
            <td class=\"column3\"><span class=\"label\">Phone Contact</span><span class=\"cell_info\">$phone</span></td>
            <td class=\"column4\"><span class=\"label\">Email</span><span class=\"cell_info\">$email</span></td></tr>";
            
            $count++;
        }
    }
    $res .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
    // foreach($result as $res) {
    //     array_push($data, $res);
    // }
    formResponse(true, $res);
} else {
    formResponse(false, 'failed to fetch');
}
