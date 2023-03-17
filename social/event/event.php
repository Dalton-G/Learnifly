<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'Learnifly';
$connection = mysqli_connect($hostname,$username,$password,$database);
if ($connection === false) {
    die('Error connecting to database' . mysqli_connect_error());
}
$sqlQuery = "SELECT * FROM event";
$result = mysqli_query ($connection, $sqlQuery);
?>

<head>
    <title>Events</title>
</head>

<div class="event-banner">
    <h2>Events</h2>
</div>

<div class="event">
    <div class="event-container">
        <?php $i=0;
        while($row = mysqli_fetch_array($result)) {?>
        <div class="item-container">
            <div class="img-container">
                <p class="event-title">
                    <?php echo $row["event_name"]; ?>
                </p>
                <div class="separator"></div>
                <p class = "event-date">
                    <?php $dt = date_create($row['event_start_time']);
                    echo date_format($dt, 'd M Y');
                    ?> 
                </p>    
            </div>         
            <div class="content-container">
                <div class="overlay"></div>
                <div class="event-info">
                    <div class="additional-event-info">
                        <p class="info">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $row["event_location"]; ?>
                        </p>
                        <p class="info">
                            <i class="far fa-calendar-alt"></i>
                            Start <?php echo $row["event_start_time"]; ?>
                        </p>
                        <p class="info">
                            <i class="far fa-calendar-alt"></i>
                            End <?php echo $row["event_end_time"]; ?>
                        </p>
                        <p class="info description">
                            <?php echo $row["event_description"]; ?>
                        </p>
                    </div>
                </div>
            </div>
        
            <button class="view">Join Now</button>
        </div>
        <?php $i++;} ?>
    </div>
</div>


<div class="fix">
<?php
    include ("../../../Learnifly/navbar/footer.php");
?> 
</div>