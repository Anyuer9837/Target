<?php
include 'db.php';

/**
 * 关闭 mysqli 错误输出
 * 防止 SQL 语法错误、路径、行号泄露
 */
mysqli_report(MYSQLI_REPORT_OFF);
error_reporting(0);
ini_set('display_errors', '0');

$success = false;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ⚠️ 教学用途：故意保留 SQL 注入点
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // @ 用于防止 PHP warning 直接输出
    $result = @mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>SQL 注入学习靶场</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #f0f4ff, #f9fafb);
            font-family: -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, "PingFang SC",
            "Hiragino Sans GB", "Microsoft YaHei", Arial;
            color: #333;
        }
        .container {
            width: 520px;
            margin: 90px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            padding: 28px 32px 32px;
        }
        h1 {
            margin: 0 0 18px;
            text-align: center;
            font-size: 22px;
            letter-spacing: .5px;
        }
        .hint {
            background: #f6f8ff;
            border: 1px solid #d6e0ff;
            border-radius: 6px;
            padding: 14px 16px;
            font-size: 14px;
            line-height: 1.7;
            color: #333;
            margin-bottom: 22px;
        }
        label {
            display: block;
            margin-top: 14px;
            font-size: 14px;
            font-weight: 600;
        }
        input {
            width: 100%;
            margin-top: 6px;
            padding: 10px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #d9d9d9;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        input:focus {
            border-color: #5b8cff;
            box-shadow: 0 0 0 2px rgba(91,140,255,.15);
        }
        button {
            margin-top: 22px;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            background: linear-gradient(90deg, #5b8cff, #3f6fff);
            color: #fff;
            font-weight: 600;
            letter-spacing: .5px;
        }
        button:hover {
            opacity: .95;
        }
        .success {
            margin-top: 20px;
            padding: 12px;
            background: #e6f4ea;
            border: 1px solid #b7ebc6;
            border-radius: 6px;
            color: #1e7e34;
            font-weight: 600;
            text-align: center;
        }
        .fail {
            margin-top: 20px;
            padding: 12px;
            background: #fff1f0;
            border: 1px solid #ffa39e;
            border-radius: 6px;
            color: #a8071a;
            font-weight: 600;
            text-align: center;
        }
        .footer {
            margin-top: 22px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>SQL 注入学习靶场</h1>

    <div class="hint">
        🎯 <strong>任务说明：</strong><br>
        请尝试通过<strong>构造合适的输入</strong>，
        使本页面在未掌握真实账号信息的情况下，
        返回<strong>“登录成功”</strong>的结果。
    </div>

    <form method="post">
        <label>用户名</label>
        <input name="username" autocomplete="off">

        <label>密码</label>
        <input name="password" type="password" autocomplete="off">

        <button type="submit">登录</button>
    </form>

    <?php if ($success): ?>
        <div class="success">✅ 登录成功</div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="fail">❌ 登录失败</div>
    <?php endif; ?>

    <div class="footer">
        SQL 注入学习靶场 · PHP + MySQL · 教学用途
    </div>
</div>
</body>
</html>
