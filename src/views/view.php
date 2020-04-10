<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ce69e8aa32.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?= time() ?>" media="screen"/>
    <link href='https://fonts.googleapis.com/css?family=Aguafina Script' rel='stylesheet'>
</head>
<body>
    <?php if (isset($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <p><?=$error?></p>
        <?php endforeach ?>
    <?php endif ?>

    <div class="container">
        <header class="header">
            <div class="date">
                <div>
                    <h1><?= date('d'); ?></h1>
                </div>
                <div>
                    <b><?= date('F'); ?></b><br>
                    <span><?= date('Y'); ?></span>
                </div>
            </div>
            <div class="day">
                <h2>
                    <?= date('l'); ?>
                </h2>
            </div>
        </header>
    <ul class="list">
        <?php foreach ($todoItems as $model) : ?>
            <li class="<?= $model->getDone() ? 'done' : '' ?>">
                <div class="title">
                    <h3>
                        <b><?= $model->getTitle()."--".$model->getDescription()."--".$model->getCreatedDate() ?></b>
                    </h3>
                </div>
                <div>
                    <form method="post" action="">
                        <input type="hidden" name="method" value="patch">
                        <input type="hidden" name="id" value="<?= $model->getId() ?>">
                        <button class="3tt"   type="submit"><i class="far fa-check-circle"></i></button>
                    </form>
                </div>
                <div>
                    <form method="post" action="">
                        <input type="hidden" name="method" value="delete">
                        <input type="hidden" name="id" value="<?= $model->getId() ?>">
                        <button  class="remove-button" type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
                </li>
        <?php endforeach ?>
    </ul>
    <form method="post" action="">
        <input type="hidden" name="method" value="post">
        <ul class="errorMessages"></ul>
    
        <div class="inputDiv" name="titlediv">
            <label for="title">Title:</label>
            <input id="title" class="inputins"  name="title" type="text" required>
        </div>

        <div class="inputDiv" name="descrdiv">
            <label for="description">Description:</label>
            <input id="description" class="inputins" type="text" name="description" required>
        </div>
        
        <div class="buttons">
            <footer class="addbtn">
                <button class=add-button type="submit">
                    <i class="fas fa-plus"></i>
                </button>
            </footer>
        </div>
    </form>​
</body>
</html>