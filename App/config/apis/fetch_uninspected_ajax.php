<?php

session_start();

include_once '../connection.php';
include_once '../globals.php';

$data = "";
$dataArr = array();
$id = sanitize($_SESSION['eval_id']);

$fetch_sql = "SELECT * FROM `nursery` NATURAL JOIN `nursery_details` NATURAL JOIN `applications`  NATURAL JOIN `evaluator_assignment` WHERE `evaluator_assignment`.inspected = '0' and `evaluator_assignment`.eval_id = '$id'";

if ($result = $conn->query($fetch_sql)) {
    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $reg = $row['reg_num'];
            $name = $row['nursery_name'];
            $man = $row['manager'];
            $phone = $row['manager_phone'];
            $dateAss = explode(' ', $row['date_assigned'])[0];
            $assignment_id = $row['assignment_id'];
            // global $dataArr;
            // array_push($dataArr, $reg, $name, $man, $phone, $dateAss, $assignment_id);

            global $data;
            $data .= "<tr class=\"data flex-sb-aic\">
            <td class=\"column8 count btn\"><span>$count</span><span class=\"cell_info\"></span></td>
           <td class=\"column1\"><span class=\"label\">Registration Number</span><span class=\"cell_info\">$reg</span></td>
           <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">$name</span></td>
           <td class=\"column3\"><span class=\"label\">Manager</span><span class=\"cell_info\">$man</span></td>
           <td class=\"column4\"><span class=\"label\">Manager's Contact</span><span class=\"cell_info\">$phone</span></td>
           <td class=\"column5 date__ass\"><span class=\"label\">Date Assigned</span><span class=\"cell_info\">$dateAss</span></td>


           <td class=\"column7 btn\"><span class=\"label\">More</span><span class=\"cell_info\"><i id=\"$reg\"class=\"fa fa-eye view__button\"></i></span></td>
           <td class=\"column6\">
           <span class=\"label\">Start Inspection</span><span class=\"cell_info\"> <button id=\"$assignment_id\" class=\"button inspectBtn apply_button\">Inspect</button></span>
           </td></tr>";

           $count++;
        }
    }
    $data .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
    formResponse(true, $data);
} else {
    formResponse(true, 'no fetch data');
}
