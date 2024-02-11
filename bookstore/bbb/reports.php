<?php
require_once('mysql_connect.php'); 
$query_user = "SELECT count(username) FROM customer";
$result_user = mysqli_query($dbConnection, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

$query1 = "SELECT count(title) FROM book WHERE category_Id = 1";
$result1 = mysqli_query($dbConnection, $query1);
$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT count(title) FROM book WHERE category_Id = 2";
$result2 = mysqli_query($dbConnection, $query2);
$row2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT count(title) FROM book WHERE category_Id = 3";
$result3 = mysqli_query($dbConnection, $query3);
$row3 = mysqli_fetch_assoc($result3);

$query4 = "SELECT count(title) FROM book WHERE category_Id = 4";
$result4 = mysqli_query($dbConnection, $query4);
$row4 = mysqli_fetch_assoc($result4);

$array = array(array($row1['count(title)'],"Fantsy"),array($row2['count(title)'],"Adventure"),
array($row3['count(title)'],"Fiction"),array($row4['count(title)'],"Horror"));
rsort($array);

echo '<p style="font-size: 24px"; >There are '.$row_user['count(username)'].' customers in total<p>';
echo '<p style="font-size: 24px";>Statistical information about books</p>';
echo '<p style="font-size: 16px";>'.$array[0][1].':  '.$array[0][0].'</p>';
echo '<p style="font-size: 16px";>'.$array[1][1].':  '.$array[1][0].'</p>';
echo '<p style="font-size: 16px";>'.$array[2][1].':  '.$array[2][0].'</p>';
echo '<p style="font-size: 16px";>'.$array[3][1].':  '.$array[3][0].'</p>';
echo '<p style="font-size: 24px";>Month sales for 2023</p>';


$query_month = "SELECT month(order_date),sum(quantity*price) FROM make_order natural join purchasing natural join book 
WHERE year(order_date) = 2023 GROUP BY month(order_date) ORDER BY month(order_date)";
$result_month = mysqli_query($dbConnection, $query_month);
$sum = 0;
while($row_month = mysqli_fetch_assoc($result_month))
{
    $sum = $sum + number_format($row_month['sum(quantity*price)'],2);
    echo 'Month '.$row_month['month(order_date)'].' : $'.number_format($row_month['sum(quantity*price)'],2).'</br>';
}
echo 'Average month sale is $'.number_format($sum/mysqli_num_rows($result_month),2);





$query_title_review = "SELECT title, count(review_num) FROM book natural join review GROUP BY title";
$result_title_review = mysqli_query($dbConnection, $query_title_review);

// Display book titles and review counts
if (mysqli_num_rows($result_title_review) > 0) {
    echo '<p style="font-size: 24px";>the number of reviews for each book</p>';
    while($row = mysqli_fetch_assoc($result_title_review)) {
        $title = $row['title'];
        $review_count = $row['count(review_num)'];
        echo "Title: $title | Review count: $review_count<br>";
    }
} else {
    echo "No book titles found.";
}
mysqli_free_result($result_user);
mysqli_free_result($result1);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_free_result($result4);
mysqli_free_result($result_title_review);
mysqli_close($dbConnection);

echo '<div class="d-grid gap-2 col-8 mx-auto">';
echo '<a class="btn btn-md btn-warning btn-block" href="admin_tasks.php">Exist Report </a>';
echo '</div>';
?>