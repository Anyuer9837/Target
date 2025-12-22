<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>ptb-lab | 用户中心</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
        }
        .container {
            width: 460px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid #ddd;
            object-fit: cover;
            display: block;
            margin: 0 auto 8px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field label {
            font-size: 13px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }
        .field input {
            width: 100%;
            padding: 9px;
            border: 1px solid #ccd2d8;
            border-radius: 4px;
        }
        .upload-btn {
            text-align: center;
            margin: 15px 0;
        }
        button {
            padding: 10px 18px;
            background: #1976d2;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="file"] {
            display: none;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>用户中心</h2>

        <!-- 头像 -->
        <img src="yuer.jpg" id="avatarPreview" class="avatar">

        <div class="upload-btn">
            <button type="button" onclick="selectAvatar()">更换头像</button>
        </div>
    </div>

    <!-- iframe：防刷新 -->
    <iframe name="hidden_iframe" style="display:none;"></iframe>

    <form
            method="post"
            action="upload.php"
            target="hidden_iframe"
            onsubmit="return checkAvatar()"
    >
        <!-- 真实选择文件，仅用于前端 -->
        <input type="file" id="avatar" onchange="previewAvatar(this)">

        <!-- ❗ 只把“文件名”提交给后端 -->
        <input type="hidden" name="avatar_name" id="avatar_name">

        <div class="field">
            <label>用户名</label>
            <input type="text" value="ptb_user">
        </div>

        <div class="field">
            <label>邮箱</label>
            <input type="email" value="user@ptb-lab.com">
        </div>

        <div class="field">
            <label>手机号</label>
            <input type="text" value="138****8888">
        </div>

        <div class="field">
            <label>地址</label>
            <input type="text" value="Beijing · China">
        </div>

        <div class="actions">
            <button type="submit">保存修改</button>
        </div>
    </form>

    <div>
        🎯 <strong>任务说明：</strong><br>
        本页面模拟了一个普通的用户资料修改功能。<br><br>
        请设法让系统接受一个<strong>本不应被允许的文件格式</strong>，
        此类文件在实际环境中往往具有<strong>安全风险</strong>。
    </div>


</div>

<script>
    function selectAvatar() {
        document.getElementById('avatar').click();
    }

    // 本地预览（当次生效）
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            document.getElementById('avatarPreview').src =
                URL.createObjectURL(input.files[0]);

            // ❗ 只记录文件名
            document.getElementById('avatar_name').value =
                input.files[0].name;
        }
    }

    // ❌ 漏洞点：仅前端校验
    function checkAvatar() {
        var name = document.getElementById('avatar_name').value;

        if (!name) {
            alert('请选择头像文件');
            return false;
        }

        if (!name.toLowerCase().endsWith('.jpg')) {
            alert('只允许上传 JPG 格式头像');
            return false;
        }
        return true;
    }
</script>

</body>
</html>
