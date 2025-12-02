<?php
    include 'db.php';

    $success = false;
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $term = trim($_POST['term'] ?? '');
        $definition = trim($_POST['definition'] ?? '');

        if ($term !== '' && $definition !== '') {
            $sql = "INSERT INTO terms (term, definition) VALUES ('$term', '$definition')";

            if (mysqli_query($mysql, $sql)) {
                $success = true;
            } 
            else {
                $error = 'Ошибка при добавлении в БД: ' . mysqli_error($mysql);
            }
        } 
        else {
            $error = 'Поля не должны быть пустыми.';
        }
    }
?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Ганичева Виктория Сергеевна, 241-361, лабораторная работа №5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,100..900&display=swap&subset=cyrillic" rel="stylesheet">
        
        <link rel="stylesheet" href="css/styles_addPage.css">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">База данных</a></li>
                    <li><a href="add.php"><h4>Добавить данные</h4></a></li>
                </ul>
            </nav>
        </header>

        <img class="background" src="src/background.jpg" alt="фон">

        <main>
            <div class ="rectangle_info">

                

                <form method="post" action="add.php">
                    <h1>Добавить данные</h1>

                    <label>
                        <input type="text" name="term"  placeholder=" Введите термин..." required>
                    </label>

                    <label>
                        <textarea name="definition" rows="5" cols="40" placeholder=" Введите определение..." required></textarea>
                    </label>
                    
                    <button>Добавить</button>
                    <p><a href="index.php">Вернуться на главную</a></p>
                </form>

                <?php if ($success): ?>
                    <p class="success-message">Термин успешно добавлен!</p>
                <?php elseif ($error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php endif; ?>
            </div>
        </main>

        <footer>
            <?php date_default_timezone_set('Europe/Moscow'); ?>
            <p>Сформировано <?php echo date('d.m.Y \в H-i:s'); ?></p>
        </footer>
    </body>
</html>