<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thong tin sinh viên</h1>
    <table border=1>
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Quê quán</th>
            </tr>
        </thead>
        <tbody>
<tr>
    <td><?= $sv['hoten']?></td>
    <td><?= $sv['namsinh']?></td>
    <td><?= $sv['quequan']?></td>
</tr>
        </tbody>
    </table>
</body>
</html>