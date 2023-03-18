<?php

function downloadCourse($file_name) {
    $directory = '../../../Learnifly/resources/courseResource/'. $file_name;
    return $directory;
}

function downloadAssignment($file_name) {
    $directory = '../../../Learnifly/resources/courseAssignment/'. $file_name;
}
?>