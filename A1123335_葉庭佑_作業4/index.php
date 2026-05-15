<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>拉基郵件發送系統</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; background: #f4f4f9; color: #333; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        input, button, textarea { padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .progress { font-weight: bold; color: #28a745; }
    </style>
</head>
<body>

    <div class="card">
        <h3>1. 撰寫信件內容</h3>
        <input type="text" id="mailSubject" placeholder="信件主旨" style="width: 100%;" ><br>
        <textarea id="mailBody" placeholder="信件內容" style="width: 100%; height: 100px; resize: vertical;"></textarea>
    </div>

    <div class="card">
        <h3>2. 新增收件人</h3>
        <input type="email" id="newEmail" placeholder="輸入 Email" required>
        <button onclick="addEmail()">新增至資料庫</button>
    </div>

    <div class="card">
        <h3>3. 批次寄送設定</h3>
        <p class="progress" id="progressText"></p>
        
        <h4>A. 寄送給幾個目標email</h4>
        <button onclick="startBatchSend('all')">全部寄送</button>
        <input type="number" id="randomCount" placeholder="要隨機挑選幾個gmail來寄送" style="width: 220px;">
        <button onclick="startBatchSend('random')">隨機寄送</button>
        
        <h4>B. 間隔時間設定 (預設無間隔)</h4>
        <input type="number" id="minDelay" placeholder="最小秒數" style="width: 100px;"> ~ 
        <input type="number" id="maxDelay" placeholder="最大秒數" style="width: 100px;">
    </div>

    <div class="card">
        <h3>4. 收件人列表與個別排程</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>狀態 / 倒數計時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="emailList"></tbody>
        </table>
    </div>

<script>
    loadEmails();
    let emailData = [];

    async function loadEmails() {
        const res = await fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'action=get_emails'
        });
        emailData = await res.json();
        renderTable();
    }

    function renderTable() {
        const tbody = document.getElementById('emailList');
        tbody.innerHTML = '';
        emailData.forEach(row => {
            let statusHtml = row.status;
            
            if (row.status === 'scheduled' && row.target_time) {
                const targetTime = new Date(row.target_time).getTime();
                statusHtml = `<span id="timer_${row.id}">計算中...</span>`;
                startCountdown(row.id, targetTime, row.email);
            }

            tbody.innerHTML += `
                <tr>
                    <td>${row.id}</td>
                    <td>${row.email}</td>
                    <td>${statusHtml}</td>
                    <td>
                        <input type="number" id="delay_${row.id}" placeholder="延遲秒數" style="width:100px;">
                        <button onclick="scheduleEmail(${row.id}, '${row.email}')">排程寄送</button>
                    </td>
                </tr>
            `;
        });
    }

    async function addEmail() {
        const email = document.getElementById('newEmail').value;
        if (!email) return alert('請輸入 Email');
        await fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `action=add_email&email=${email}`
        });
        document.getElementById('newEmail').value = '';
        loadEmails();
    }

    async function scheduleEmail(id, email) {
        const seconds = parseInt(document.getElementById(`delay_${id}`).value);
        if (!seconds || seconds <= 0) return alert('請輸入有效的秒數');

        const targetTime = new Date(Date.now() + seconds * 1000);
        

        const year = targetTime.getFullYear();
        const month = String(targetTime.getMonth() + 1).padStart(2, '0');
        const date = String(targetTime.getDate()).padStart(2, '0');
        const hours = String(targetTime.getHours()).padStart(2, '0');
        const mins = String(targetTime.getMinutes()).padStart(2, '0');
        const secs = String(targetTime.getSeconds()).padStart(2, '0');
        const formattedTime = `${year}-${month}-${date} ${hours}:${mins}:${secs}`;

        await fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `action=update_status&id=${id}&status=scheduled&time=${formattedTime}`
        });
        loadEmails();
    }

    function startCountdown(id, targetTime, email) {
        const timer = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetTime - now;

            const el = document.getElementById(`timer_${id}`);
            if (!el) { clearInterval(timer); return; }

            if (distance < 0) {
                clearInterval(timer);
                el.innerText = '正在寄送';
                sendSingleEmail(id, email).then(() => loadEmails());
            } else {
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                el.innerText = `排程中，剩餘: ${minutes}分 ${seconds}秒`;
            }
        }, 1000);
    }

    async function sendSingleEmail(id, email) {
        const subject = document.getElementById('mailSubject').value || '無主旨';
        const body = document.getElementById('mailBody').value || '無內容';

        await fetch('api.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `action=send_email&id=${id}&email=${email}&subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`
        });
    }


    async function startBatchSend(mode) {
        let listToSend = [...emailData].filter(e => e.status !== 'scheduled'); 
        
        if (mode === 'random') {
            const count = parseInt(document.getElementById('randomCount').value);
            if (!count) return alert('請輸入隨機挑選數量');
            listToSend = listToSend.sort(() => 0.5 - Math.random()).slice(0, count);
        }

        if (listToSend.length === 0) return alert('沒有可寄送的 Email');

        const minDelay = parseInt(document.getElementById('minDelay').value) || 0;
        const maxDelay = parseInt(document.getElementById('maxDelay').value) || 0;

        document.getElementById('progressText').innerText = `準備寄送 ${listToSend.length} 封信...`;

        for (let i = 0; i < listToSend.length; i++) {
            const target = listToSend[i];
            document.getElementById('progressText').innerText = `進度: ${i + 1} / ${listToSend.length} (正在寄給 ${target.email})`;
            
            await sendSingleEmail(target.id, target.email);

            if (maxDelay > 0 && i < listToSend.length - 1) {
                const randomWait = Math.floor(Math.random() * (maxDelay - minDelay + 1) + minDelay);
                document.getElementById('progressText').innerText += ` ...等待 ${randomWait} 秒下一封`;
                await new Promise(resolve => setTimeout(resolve, randomWait * 1000));
            }
        }
        
        document.getElementById('progressText').innerText = '批次寄送完成！';
        loadEmails();
    }
</script>
</body>
</html>