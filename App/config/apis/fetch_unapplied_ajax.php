<?php

session_start();

include_once '../connection.php';
include_once '../globals.php';

$data = "";
$count = 1;
$user_id = sanitize($_SESSION['id']);

$fetch_sql = "SELECT nursery.reg_num, nursery.nursery_name, nursery_details.manager, nursery.dateRegistered  FROM `nursery` NATURAL JOIN nursery_details WHERE nursery.user_id = '$user_id' AND nursery.applied = '0' ORDER BY nursery_id DESC";

$fetch_reapp_sql = "SELECT nursery.reg_num, nursery.nursery_name, nursery_details.manager, nursery.dateRegistered  FROM `nursery` NATURAL JOIN nursery_details WHERE nursery.user_id = '$user_id' AND nursery.applied = '1' ORDER BY nursery_id DESC";

if ($result = $conn->query($fetch_sql)) {

    if ($result->num_rows > 0) {
        global $count;
        while ($row = $result->fetch_assoc()) {
            $reg = $row['reg_num'];
            $name = $row['nursery_name'];
            $man = $row['manager'];
            $reg_date = explode(' ', $row['dateRegistered'])[0];

            global $data;
            $data .= "<tr class=\"data flex-sb-aic\">
           <td class=\"column6 count\"><span>$count</span><span class=\"cell_info\"></span></td>
           <td class=\"column1\"><span class=\"label\">Registration Number</span><span class=\"cell_info\">$reg</span></td>
           <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">$name</span></td>
           <td class=\"column3\"><span class=\"label\">Manager</span><span class=\"cell_info\">$man</span></td>
           <td class=\"column5 date__reg\"><span class=\"label\">Registration Date</span><span class=\"cell_info\">$reg_date</span></td>
           <td class=\"column4\"><span class=\"label\">Apply for Certification</span><span class=\"cell_info\"><button id=\"$reg\" class=\"button apply_button\">Apply</button></span></td>
         </tr>";

            $count++;
        }
    }
    if ($result_2 = $conn->query($fetch_reapp_sql)) {

        if ($result_2->num_rows > 0) {
            global $count;
            while ($row_2 = $result_2->fetch_assoc()) {
                $reg_2 = $row_2['reg_num'];
                $name_2 = $row_2['nursery_name'];
                $man_2 = $row_2['manager'];
                $reg_date_2 = explode(' ', $row_2['dateRegistered'])[0];

                $fetch_app_status = "SELECT status FROM applications WHERE applications.reg_num = '$reg_2' ORDER BY applications.application_id DESC LIMIT 1";
                if ($status_exec = $conn->query($fetch_app_status)) {
                    $data .= 'secWorked';
                    $status_row = $status_exec->fetch_assoc();
                    $status = $status_row['status'];
                    if ($status == 'rejected') {
                        global $data;
                        $data .= "<tr class=\"data flex-sb-aic\">
                        <td class=\"column6 count\"><span>$count</span><span class=\"cell_info\"></span></td>
                        <td class=\"column1\"><span class=\"label\">Registration Number</span><span class=\"cell_info\">$reg_2</span></td>
                        <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">$name_2</span></td>
                        <td class=\"column3\"><span class=\"label\">Manager</span><span class=\"cell_info\">$man_2</span></td>
                        <td class=\"column5 date__reg\"><span class=\"label\">Registration Date</span><span class=\"cell_info\">$reg_date_2</span></td>
                        <td class=\"column4\"><span class=\"label\">Apply for Certification</span><span class=\"cell_info\"><button id=\"$reg_2\" class=\"button apply_button\">Apply</button></span></td>
                        </tr>";
                    }
                }
                $count++;

            }
        }
        // $data .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
        // foreach($result as $res) {
        //     array_push($data, $res);
        // }
        // formResponse(true, $data);
    }

    $data .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
    // foreach($result as $res) {
    //     array_push($data, $res);
    // }
    formResponse(true, $data);
} else {
    formResponse(false, 'failed to fetch');
}

// $message = 'accessed the fetch_app api';
// formResponse(true, $message);
