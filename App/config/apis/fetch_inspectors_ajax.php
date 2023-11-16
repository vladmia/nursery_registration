<?php

session_start();

include_once '../connection.php';
include_once '../globals.php';

$res = '';

$fetch_sql = "SELECT * from evaluators";

if ($result = $conn->query($fetch_sql)) {
    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $eval_id = $row['evaluator_id'];
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $region = $row['region'];
            $centre = $row['center'];
            $active = $row['active'];
            global $res; 

            if ($active) {
                $res .= "<tr class=\"data active flex-sb-aic\">";
            } else {
                $res .= "<tr class=\"data inactive flex-sb-aic\">";
            }


            $res .= "
            <td class=\"column7 count btn\"><span>$count</span><span class=\"cell_info\"></span></td>
            <td class=\"column1\"><span class=\"label\">First Name</span><span class=\"cell_info\">$fname</span></td>
            <td class=\"column2 last__name\"><span class=\"label\">Last Name</span><span class=\"cell_info\">$lname</span></td>
            <td class=\"column3\"><span class=\"label\">Email</span><span class=\"cell_info\">$email</span></td>
            <td class=\"column3\"><span class=\"label\">Phone Contact</span><span class=\"cell_info\">$phone</span></td>
            <td class=\"column4\"><span class=\"label\">Region</span><span class=\"cell_info\">$region</span></td>
            <td class=\"column5\"><span class=\"label\">Centre</span><span class=\"cell_info\">$centre</span></td>";
            if ($active) {
                $res .= "<td class=\"column6 btn\">
                <span class=\"label\">Set Status</span><span class=\"cell_info\"><label class=\"switch activated\"><input id=\"$eval_id\" type=\"checkbox\" checked><span class=\"slider\"></span>
                </label></span>
                </td></tr>";
            } else {
                $res .= "<td class=\"column6 btn\">
                <span class=\"label\">Set Status</span><span class=\"cell_info\"><label class=\"switch\"><input id=\"$eval_id\" type=\"checkbox\"><span class=\"slider\"></span>
                </label></span>
                </label></td></tr>";
            }

            $count++;
        }
    }
    $res .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
    // foreach($result as $res) {
    //     array_push($data, $res);
    // }
    formResponse(true, $res);
} else {
    formResponse(true, 'failed to fetch');
}
