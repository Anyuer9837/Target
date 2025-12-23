<?php
// ❌ 错误示范：信任前端传来的文件名
$filename = $_POST['avatar_name'] ?? '';

if ($filename === '') {
    echo "<script>alert('未选择文件');</script>";
    exit;
}

if (preg_match('/\.jpg$/i', $filename)) {
    echo "<script>
        alert('头像更新成功（正常用户路径）\\n刷新重来一次吧！');
    </script>";
    exit;
}

// 漏洞路径
echo "<script>
    alert('🎉 恭喜你，成功绕过前端校验！\\n刷新界面后图片会恢复，是由于后台的重置，但是你的攻击已经成功了');
</script>";
