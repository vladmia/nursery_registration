<?php

    include_once('../connection.php');
    include_once('../globals.php');

    $response = "";
    $evals = "";

    $fetch_unassigned = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications WHERE applications.assigned = 0 ORDER BY application_id DESC";

    $fetch_evals = "SELECT evaluator_id, f_name, l_name, region FROM evaluators WHERE active = '1'";
    
    if ($fetch_eval_res = $conn->query($fetch_evals)) {
        $evals .= "<select><option  value=\"\" selected  >--.--</option>";
        while ($data = $fetch_eval_res->fetch_assoc()) {
            $eval_id = $data['evaluator_id'];
            $name = $data['f_name'] . " " . $data['l_name'];
            $region = $data['region'];
            $evals .= "<option value='$eval_id'>$name-$region</option>";
            // $evals .= "<option value=\"$data['evaluator_id']\">" . $data['f_name'] . $data['l_name'] . " - " . $data['region'] . "</option>"
        }
        $evals .= "</select>";
    }

    if ( $result = $conn->query($fetch_unassigned)) {
        if ($result->num_rows > 0) {
            $count = 1;
            while ($data = $result->fetch_assoc()) {
                $response .= "<tr class=\"data flex-sb-aic\">
                <td class=\"column4 count btn\"><span>$count</span><span class=\"cell_info\"></span></td>
                <td class='reg'><span class=\"label\">Registration Number</span><span class=\"cell_info\">". $data['reg_num'] . "</span></td>
                <td class=\"column2\"><span class=\"label\">Nursery Name</span><span class=\"cell_info\">" . $data['nursery_name'] . "</span></td>
                <td class=\"date__reg\"><span class=\"label\">Date Registered</span><span class=\"cell_info\">" . explode(' ', $data['dateRegistered'])[0] . "</span></td>
                <td><span class=\"label\">County</span><span class=\"cell_info\">" . $data['county'] . "</span></td>
                <td><span class=\"label\">Select Evaluator</span><span class=\"cell_info\">$evals</span></td>
                <td class=\"btn\"><span class=\"label\">View More</span><span class=\"cell_info\"><i id=\"" . $data['reg_num'] . "\"class=\"fa fa-eye view__button\"></i></span></td>
                </tr>";

                $count++;
            }
        }
        $response .= '<tr class="app__empty d_none hide flex-col-jcaic"><td class="message">There is no data to display here</td><td class="image"></td></tr>';
        formResponse(true, $response);
    } else {
        formResponse(false, 'query failed');
    }


