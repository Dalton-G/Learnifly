<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<head>
    <title>Manage Classes</title>
</head>

    <h1 class = "page_title">Manage Classes</h1>

    

        <div class = "div-container">
            <img src="../../../Learnifly/images/tp063403/manage/managing.png" alt="" class = "main_image">
            <div class = "button-container" style = "margin-top: 170px">  
                <div class = "button-item">
                    <form action = "../class/createClass.php" method = "get">
                        <button type = "submit" name = "add_course_button" class = "default_button"><i class="fa-regular fa-plus"></i>Create Class</button>
                    </form>
                </div>
            </div>
        </div>


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>