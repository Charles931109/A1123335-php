<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>夏令營報名表</title>
</head>

<body>
    <h1>夏令營報名表</h1>
    <form action="" method="post">
        姓名：<input type="text" name="uName" placeholder="請輸入姓名" required><br />

        性別：
        男<input type="radio" name="mGender" value="m">
        女<input type="radio" name="mGender" value="f" checked><br />

        飲食習慣：
        葷食<input type="checkbox" name="diet[]" value="meat" checked>
        素食<input type="checkbox" name="diet[]" value="veggie">
        不吃牛<input type="checkbox" name="diet[]" value="no-beef"><br />

        報名梯次：
        <select name="nSession">
            <option value="s1">第一梯次 (7/01-7/07)</option>
            <option value="s2">第二梯次 (7/08-7/14)</option>
            <option value="s3">第三梯次 (7/15-7/21)</option>
        </select>
        <br />

        出生日期：<input type="date" name="uBirth" value=""><br />
        聯絡信箱：<input type="email" name="uEmail" required><br />

        備註事項：<br />
        <textarea name="comment" rows="5" cols="30"></textarea>
        <br />

        <input type="submit" value="提交報名">
        <input type="reset" value="重新填寫">
    </form>
</body>

</html>