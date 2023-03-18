<?php

function downloadCourse($file_name) {
    if ($file_name == "") {
        return "pending";
    } else {
        $directory = '../../../Learnifly/resources/courseResource/'. $file_name;
        return "<a class='download-file-btn' href='" . $directory . "' download>Download</a>";
    }
}

function downloadAssignment($file_name) {
    if ($file_name == "") {
        return "pending";
    } else {
        $directory = '../../../Learnifly/resources/courseAssignment/'. $file_name;
        return "<a class='download-file-btn' href='" . $directory . "' download>Download</a>";
    }
}

function checkGrade($grade) {
    if ($grade == "") {
        return "pending";
    } else {
        return $grade;
    }
}
?>