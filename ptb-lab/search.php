<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>ptb-lab | 查询结果</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 520px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .result {
            padding: 15px;
            background: #eef2f5;
            font-size: 15px;
            word-break: break-all;
        }
        .normal {
            margin-top: 20px;
            padding: 15px;
            background: #e3f2fd;
            border-left: 4px solid #1976d2;
            color: #0d47a1;
        }
        .success {
            margin-top: 20px;
            padding: 15px;
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            color: #2e7d32;
            font-weight: bold;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #1976d2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>查询结果</h2>

    <div class="result">
        你提交的查询值是：<br>
        <strong><?php echo $id; ?></strong>
    </div>

    <?php
    if (ctype_digit($id)) {
        echo '<div class="normal">你使用的是正常查询路径。</div>';
    } else {
        echo '<div class="success">恭喜你，成功通过ptb-lab</div>';
    }
    ?>

    <a href="index.php">返回</a>
</div>

</body>
</html>
