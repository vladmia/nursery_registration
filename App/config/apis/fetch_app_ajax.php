<?php

session_start();

include_once '../connection.php';
include_once '../globals.php';

$data = "";
$user_id = sanitize($_SESSION['id']);

$fetch_sql = "SELECT nursery.reg_num, nursery.nursery_name, applications.status, applications.assigned, `applications`.`application date`, applications.application_id FROM `nursery` NATURAL JOIN nursery_details NATURAL JOIN applications WHERE nursery.user_id = '$user_id' AND nursery.applied = '1' ORDER BY application_id DESC";

if ($result = $conn->query($fetch_sql)) {
    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $reg = $row['reg_num'];
            $name = $row['nursery_name'];
            $status;
            if ($row['status'] == "rejected") {
                $status = 'declined';
            } else {
                $status = $row['status'];
            }
            $date_app = explode(' ', $row['application date'])[0];
            $app_id = $row['application_id'];

            $get_insp = "SELECT inspected from normal WHERE normal.app_id = '$app_id'";
            if ($insp_res = $conn->query($get_insp)) {
                $insp_assoc = $insp_res->fetch_assoc();
                $insp = $insp_assoc['inspected'];

                global $data;
                if ($insp == 0) {
                    $data .= "<tr class=\"data flex-sb-aic\">
                    <td class=\"column9 count\"><span>$count</span><span class=\"cell_info\"></span></td>
                    <td class=\"column1\"><span class=\"label\">Registration Number</span><span class=\"cell_info\">$reg</span></td>
                    <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">$name</span></td>
                    <td class=\"column3 date__applied\"><span class=\"label\">Date Applied</span><span class=\"cell_info\">$date_app</span></td>
                    <td class=\"column5 date__insp\"><span class=\"label\">Date Inspected</span><span class=\"cell_info\">__</span></td>
                    <td class=\"column6 btn\"><span class=\"label\">Score</span><span class=\"cell_info\">__</span></td>
                    <td class=\"column7 btn\"><span class=\"label\">Rating</span><span class=\"cell_info\">__</span></td>
                    <td class=\"column4 status btn\"><span class=\"label\">Status</span><span class=\"cell_info\">$status</span></td>

                    <td class=\"column8 btn\"><span class=\"label\">View Feedback</span><span class=\"cell_info\"><i class=\"fa fa-comment view__feedback\" id=\"fbk-$app_id\"></i></span></td>
                    </tr>";

                } else {
                    $fetch_sql_insp = "SELECT nursery.reg_num, nursery.nursery_name, applications.status,`applications`.`application date`, inspection.score, inspection.rate, inspection.inspection_date FROM `nursery` NATURAL JOIN nursery_details NATURAL JOIN applications NATURAL JOIN inspection NATURAL JOIN evaluator_assignment WHERE nursery.user_id = '$user_id' AND nursery.applied = '1' AND applications.application_id = '$app_id' ORDER BY application_id DESC";

                    if ($fetch_insp_res = $conn->query($fetch_sql_insp)) {
                        if ($fetch_insp_res->num_rows > 0) {
                            while ($fetch_rows = $fetch_insp_res->fetch_assoc()) {
                                $reg = $fetch_rows['reg_num'];
                                $name = $fetch_rows['nursery_name'];
                                $status;
                                if ($row['status'] == "rejected") {
                                    $status = 'declined';
                                } else {
                                    $status = $row['status'];
                                }
                                $date_app = explode(' ', $row['application date'])[0];
                                $score = $fetch_rows['score'];
                                $rating = $fetch_rows['rate'];
                                $date_insp = explode(' ', $row['application date'])[0];

                                global $data;
                                $data .= "<tr class=\"data flex-sb-aic\">
                                <td class=\"column9 count\"><span>$count</span><span class=\"cell_info\"></span></td>
                    <td class=\"column1\"><span class=\"label\">Registration Number</span><span class=\"cell_info\">$reg</span></td>
                    <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">$name</span></td>
                    <td class=\"column3 date__applied\"><span class=\"label\">Date Applied</span><span class=\"cell_info\">$date_app</span></td>
                    <td class=\"column5 date__insp\"><span class=\"label\">Date Inspected</span><span class=\"cell_info\">$date_insp</span></td>
                    <td class=\"column6 btn\"><span class=\"label\">Score</span><span class=\"cell_info\">$score%</span></td>
                    <td class=\"column7 btn\"><span class=\"label\">Rating</span><span class=\"cell_info\">$rating-Star</span></td>
                    <td class=\"column4 status btn\"><span class=\"label\">Status</span><span class=\"cell_info\">$status</span></td>

                    <td class=\"column8 btn\"><span class=\"label\">View Feedback</span><span class=\"cell_info\"><i class=\"fa fa-comment view__feedback\" id=\"fbk-$app_id\"></i></span></td>
                    </tr>
                                </tr>";
                            }
                        }
                    }
                }

            }
            $count++;
        }

        $data .= "<tr class=\"app__empty d_none hide flex-col-jcaic\"><td class=\"message\">There is no data to display here</td><td class=\"image\"></td></tr>";
    }
    // foreach($result as $res) {
    //     array_push($data, $res);
    // }
    formResponse(true, $data);
} else {
    formResponse(true, 'failed to fetch');
}

// $message = 'accessed the fetch_app api';
// formResponse(true, $message);
