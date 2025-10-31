<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест иконок</title>
    
    <!-- Bootstrap Icons (локально) -->
    <link href="{{ asset('admin-dashboard/assets/fonts/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <!-- Material Symbols (Google) -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f5f5f5;
        }
        .icon-test {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .icon-row {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 10px 0;
            font-size: 24px;
        }
        .material-symbols-rounded {
            font-family: 'Material Symbols Rounded';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
    </style>
</head>
<body>
    <h1>Тест иконок</h1>
    
    <div class="icon-test">
        <h2>Material Symbols (Google CDN)</h2>
        <div class="icon-row">
            <span class="material-symbols-rounded">dashboard</span>
            <span>dashboard</span>
        </div>
        <div class="icon-row">
            <span class="material-symbols-rounded">article</span>
            <span>article</span>
        </div>
        <div class="icon-row">
            <span class="material-symbols-rounded">group</span>
            <span>group</span>
        </div>
        <div class="icon-row">
            <span class="material-symbols-rounded">edit</span>
            <span>edit</span>
        </div>
        <div class="icon-row">
            <span class="material-symbols-rounded">delete</span>
            <span>delete</span>
        </div>
    </div>
    
    <div class="icon-test">
        <h2>Bootstrap Icons (Локально)</h2>
        <div class="icon-row">
            <i class="bi bi-speedometer2"></i>
            <span>bi-speedometer2 (dashboard)</span>
        </div>
        <div class="icon-row">
            <i class="bi bi-file-text"></i>
            <span>bi-file-text (article)</span>
        </div>
        <div class="icon-row">
            <i class="bi bi-people"></i>
            <span>bi-people (group)</span>
        </div>
        <div class="icon-row">
            <i class="bi bi-pencil"></i>
            <span>bi-pencil (edit)</span>
        </div>
        <div class="icon-row">
            <i class="bi bi-trash"></i>
            <span>bi-trash (delete)</span>
        </div>
    </div>
    
    <div class="icon-test">
        <h3>Статус загрузки шрифтов:</h3>
        <p id="status">Проверка...</p>
    </div>
    
    <script>
        // Проверка загрузки шрифтов
        document.fonts.ready.then(() => {
            const fonts = Array.from(document.fonts.values());
            const materialFont = fonts.find(f => f.family.includes('Material Symbols'));
            const statusEl = document.getElementById('status');
            
            if (materialFont && materialFont.status === 'loaded') {
                statusEl.innerHTML = '✅ Material Symbols загружены успешно!';
                statusEl.style.color = 'green';
            } else {
                statusEl.innerHTML = '❌ Material Symbols НЕ загружены. Используйте Bootstrap Icons.';
                statusEl.style.color = 'red';
            }
        });
    </script>
</body>
</html>

