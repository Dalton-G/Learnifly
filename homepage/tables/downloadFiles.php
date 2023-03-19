<?php

function downloadCourse($file_name) {
    if ($file_name == "") {
        return "pending";
    } else {
        $directory = '../../../Learnifly/resources/courseResource/'. $file_name;
        return "<a href='" . $directory . "' class='download-file-btn' download><i class='fa-solid fa-download'>&nbsp;&nbsp;&nbsp;</i>Download</a>";
    }
}

function downloadAssignment($file_name) {
    if ($file_name == "") {
        return "pending";
    } else {
        $directory = '../../../Learnifly/resources/courseAssignment/'. $file_name;
        return "<a href='" . $directory . "' class='download-file-btn' download><i class='fa-solid fa-download'>&nbsp;&nbsp;&nbsp;</i>Download</a>";
    }
}

function downloadSubmission($file_name) {
    if ($file_name == "") {
        return "pending";
    } else {
        $directory = '../../../Learnifly/resources/courseSubmission/'. $file_name;
        return "<a href='" . $directory . "' class='download-file-btn' download><i class='fa-solid fa-download'>&nbsp;&nbsp;&nbsp;</i>Download</a>";
    }
}

function checkGrade($grade) {
    if ($grade == "") {
        return "pending";
    } else {
        return $grade;
    }
}

function dropdownGradeMenu($grade) {
    if ($grade == "") {
        return "
        <form action='#' method='GET'>
        <select id='grade_given' name='grade_given'>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        <option value='F'>F</option>
        </select>
        ";
    }
}

?>