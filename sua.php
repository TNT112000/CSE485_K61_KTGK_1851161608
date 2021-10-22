

<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

  $sql = "SELECT  e.id,e.id_status,e.exam_title,e.exam_datetime,e.duration,e.total_question,e.mark_per_right_answer,e.created_on,e.exam_code,s.id_status,s.name_status FROM exam e, status_item s          
    WHERE e.id_status=s.id_status and e.id= $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
if (isset($_POST["sua"])) {
    $exam_title = $_POST['title'];
        $exam_datetime =  $_POST['datetime'];
        $duration= $_POST['duration'];
        $total_question = $_POST['question'];
        $marks_per_right_answer= $_POST['answer'];
        $created_on = $_POST['created'];
        $id_status = $_POST['status'];
        $exam_code =$_POST['code'];

    

        $sql = "UPDATE exam SET  exam_datetime='$exam_datetime' , duration=' $duration' ,total_question='$total_question',
        total_question='$total_question',marks_per_right_answer='$marks_per_right_answer',created_on='$created_on',id_status='$id_status'
        exam_code='$exam_code'
        WHERE id=$id ";

        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            header("location:index.php");
        } else {
            echo "Lỗi!";
        }


    mysqli_close($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $sql = "SELECT  e.id,e.id_status,e.exam_title,e.exam_datetime,e.duration,e.total_question,e.mark_per_right_answer,e.created_on,e.exam_code,s.id_status,s.name_status FROM exam e, status_item s
                WHERE e.id_status=s.id_status and e.id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        echo '<form action="" method="post">
        Tên <input type="text" class="" name="title" value="' . $row['exam_title'] . '"><br>
        Ngày thi <input type="date" class="" name="datetime" value="' . $row['exam_datetime'] . '"><br>
        Thời gian thi <input type="text" class="" name="duration" value="' . $row['duration'] . '"><br>
        Số câu <input type="text" class="" name="question" value="' . $row['total_question'] . '"><br>
        Điểm <input type="text" class="" name="answer" value="' . $row['mark_per_right_answer'] . '"><br>
        Ngày tạo <input type="date" class="" name="created" value="' . $row['created_on'] . '"><br>
        Mã truy cập <input type="text" class="" name="code" value="' . $row['exam_code'] . '"><br>
        Trạng thái <input type="text" class="" name="status" list="datalist" ><br>
                        <datalist id="datalist" class="select-add">';

        $sql = "SELECT * FROM status_item";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option  value="' . $row['id_status'] . '">' . $row['name_status'] . '</option>';
            }
        }

        echo '</datalist>
        <button type="submit" name="sua">sua</button>
    </form>';
    }
    ?>

</body>

</html>