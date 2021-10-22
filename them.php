<?php
include 'config.php';
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
    <p class="">THÊM</p>
    <?php
    if (isset($_POST["them"])) {
        $exam_title = $_POST['title'];
        $exam_datetime =  $_POST['datetime'];
        $duration= $_POST['duration'];
        $total_question = $_POST['question'];
        $marks_per_right_answer= $_POST['answer'];
        $created_on = $_POST['created'];
        $id_status = $_POST['status'];
        $exam_code =$_POST['code'];

            $sql = "INSERT INTO exam (exam_title,exam_datetime,duration,total_question,marks_per_right_answer,created_on,id_status,exam_code)
            VALUE ('$exam_title','$exam_datetime','$duration','$total_question','$marks_per_right_answer','$created_on','$id_status','$exam_code')";

            $result = mysqli_query($conn, $sql);
            if ($result > 0) {
                header("location: index.php");
            } else {
                echo "Lỗi!";
            }
        mysqli_close($conn);
    }
    ?>
    <form action="" method="post">
        Tên <input type="text" class="" name="title"><br>
        Ngày thi <input type="date" class="" name="datetime"><br>
        Thời gian thi <input type="text" class="" name="duration"><br>
        Số câu <input type="text" class="" name="question"><br>
        Điểm <input type="text" class="" name="answer"><br>
        Ngày tạo <input type="date" class="" name="created"><br>
        Trạng thái <input type="text" class="" name="status" list="datalist"><br>
                        <datalist id="datalist" class="select-add">
                            <?php
                            $sql = "SELECT * FROM status_item";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option  value="' . $row['id_status'] . '">' . $row['name_status'] . '</option>';
                                }
                            }
                            ?>
                        </datalist>
        Mã truy cập <input type="text" class="" name="code"><br>
        <button type="submit" name="them">them</button>
    </form>
</body>

</html>