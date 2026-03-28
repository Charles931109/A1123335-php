<form action="result.php" method="POST">

    Name:<input type="text" name="nName" placeholder="your name" value=""><br />
    Password:<input type="password" name="nPassword" required><br />
    gender:
    男<input type="radio" name="nGender" value="m">
    女<input type="radio" name="nGender" value="f" checked><br />

    Interest:
    游泳<input type="checkbox" name="nInterest[]" value="swim">
    看小說<input type="checkbox" name="nInterest[]" value="novel">
    睡覺<input type="checkbox" name="nInterest[]" value="sleep"><br />

    where are u from?<select name="nCity">
        <option value="Taipei">台北</option>
        <option value="taichaung" selected>台中</option>
        <option value="kaohsiung">高雄</option>
    </select>
    <br />

    <input type="date" name="nDate" value=""><br />
    <input type="time" name="nTime" value=""><br />
    <input type="color" name="nColor" value=""><br />
    <input type="range" name="nRange" value=""><br />
    <input type="number" name="nNumber" value=""><br />
    <input type="email" name="nEmail" value=""><br />

    <input type="hidden" name="uID" value="blablabla"><br />
    <textarea name="nComment">
        </textarea>
    <br />
    <input type="submit"><input type="reset">
    <input type="button" value="還不知道幹嘛"><br />

</form>