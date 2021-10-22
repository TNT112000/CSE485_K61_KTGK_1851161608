<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<table class="table caption-top">
  <caption>Quản lý bài thi </caption>
  <thead>
    <tr>
      <th scope="col">Mã bài thi</th>
      <th scope="col">Tên bài thi</th>
      <th scope="col">Thêm</th>
      <th scope="col">Sủa</th>
      <th scope="col">Xóa</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
  <?php
                         include 'config.php';
                         $sql = "SELECT id,exam_title	FROM exam";
                         $result = mysqli_query($conn, $sql);
                         if (mysqli_num_rows($result) > 0) {
                             while ($row = mysqli_fetch_assoc($result)) {   
   echo' <tr>
      <th scope="row">'.$row['id'].' tntn</th>
      <td>'.$row['exam_title'].'tnt</td>
      <td><a href="them.php" class="">Them</a></td>
      <td><a href="sua.php?id=' . $row['id'] . '" class="">Sửa</a></td>
      <td><a href="xoa.php?id=' . $row['id'] . '" class="">Xoa</a></td>
      <td><a href="chi-tiet.php" class="">Chi tiết</a></td>
    </tr>';
                             }
                            }  
    ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>