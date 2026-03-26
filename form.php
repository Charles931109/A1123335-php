<form action="" method="">

    Name:<input type="text" name="uName" placeholder="your name" value=""><br />
    Password:<input type="password" name="uPassword" required><br />
    gender:
    男<input type="radio" name="mGender" value="m">
    女<input type="radio" name="mGender" value="f" checked><br />

    Interest:
    游泳<input type="checkbox" name="hobby[]" value="swim">
    看小說<input type="checkbox" name="hobby[]" value="read">
    睡覺<input type="checkbox" name="hobby[]" value="sleep"><br />

    where are u from?<select name="nCity">
        <option value="Taipei">台北</option>
        <option value="taichaung" selected>台中</option>
        <option value="kaohsiung">高雄</option>
    </select>
    <br />

    <input type="time" name="uTime" value=""><br />
    <input type="date" name="uDate" value=""><br />
    <input type="color" name="uColor" value=""><br />
    <input type="range" name="uRange" value=""><br />
    <input type="number" name="uNumber" value=""><br />
    <input type="email" name="uEmail" value=""><br />

    <input type="hidden" name="uID" value="blablabla"><br />
    <textarea name="comment">
        </textarea>
    <br />
    <input type="submit"><input type="reset">
    <input type="button" value="還不知道幹嘛"><br />

</form>