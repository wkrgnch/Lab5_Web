<?php
    include 'db.php';
    $result = mysqli_query($mysql, "SELECT * FROM `terms`");
    $result_images = mysqli_query($mysql, "SELECT name, img FROM images");
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
        
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php"><h4>База данных</h4></a></li>
                    <li><a href="add.php">Добавить данные</a></li>
                </ul>
            </nav>
        </header>

        <img class="background" src="src/background.jpg" alt="фон">

        <main>
            <div class ="rectangle_info">
                <table>
                    <tr><th>Термин</th><th>Определение</th></tr>

                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['term']; ?></td>
                        <td><?php echo $row['definition']; ?></td>
                    </tr>
                <?php endwhile; ?>

                </table>

                <div class="box">
                    <?php while ($name = mysqli_fetch_assoc($result_images)) { 
                        ?>
                        <div class="filters__img">
                            <img title="<?php echo $name['name']; ?>" src="img/<?php echo $name['img']; ?>" />
                        </div>
                        <?php 
                        } 
                    ?>
                </div>
            </div>
        </main>

        <footer>
            <?php date_default_timezone_set('Europe/Moscow'); ?>
            <p>Сформировано <?php echo date('d.m.Y \в H-i:s'); ?></p>
        </footer>
    </body>
</html>