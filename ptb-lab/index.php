<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>ptb-lab</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef1f4;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                         Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
        }

        .header {
            background: #1f2933;
            color: #fff;
            padding: 18px 0;
            text-align: center;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .panel {
            width: 480px;
            margin: 80px auto;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .panel-body {
            padding: 30px;
        }

        .panel-body h3 {
            margin-top: 0;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #555;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccd2d8;
            border-radius: 4px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #1976d2;
        }

        .btn {
            width: 100%;
            padding: 11px;
            background: #1976d2;
            border: none;
            color: #fff;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background: #155fa0;
        }

        .notice {
            margin-top: 25px;
            padding: 12px 14px;
            background: #f7f9fb;
            border-left: 3px solid #1976d2;
            font-size: 13px;
            line-height: 1.6;
            color: #444;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="header">
    ptb-lab · 查询系统
</div>

<div class="panel">
    <div class="panel-body">
        <h3>编号查询</h3>

        <form method="get" action="search.php" onsubmit="return check()">
            <div class="form-group">
                <label>查询编号（仅支持数字）</label>
                <input type="text" name="id" id="id" autocomplete="off">
            </div>

            <button class="btn" type="submit">提交查询</button>
        </form>

        <div class="notice">
            系统当前仅支持<strong>数字类型</strong>的编号查询。<br>
            请根据系统规则完成一次有效的查询请求。
        </div>
    </div>
</div>

<div class="footer">
    ptb-lab
</div>

<script>
function check() {
    var id = document.getElementById("id").value;

    if (!/^[0-9]+$/.test(id)) {
        alert("参数格式错误");
        return false;
    }
    return true;
}
</script>

</body>
</html>
