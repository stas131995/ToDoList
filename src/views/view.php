<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?= time() ?>" media="screen"/>
</head>
<body>
    <?php if (isset($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <p><?=$error?></p>
        <?php endforeach ?>
    <?php endif ?>

    <div class="myheader">
        <h2>My To Do List</h2>
    </div>
    <ul class="myUL" id="myUL">
        <?php foreach ($todoItems as $model) : ?>
            <li class="<?= $model->getDone() ? 'checked' : '' ?>">
                    <table style="width:50%">
                        <tr>
                            <form method="post" action="">
                                <input type="hidden" name="method" value="patch">
                                <input type="hidden" name="id" value="<?= $model->getId() ?>">
                                <button class="row"   type="submit">
                                    <?= $model->getTitle()."--".$model->getDescription()."--".$model->getCreatedDate() ?>
                                </button>
                            </form>
                        </tr>
                        <tr>
                            <form method="post" action="">
                                <input type="hidden" name="method" value="delete">
                                <input type="hidden" name="id" value="<?= $model->getId() ?>">
                                <button  class="remove-button" type="submit">-</button>
                            </form>
                        </tr>
                    </table>

                </li>
        <?php endforeach ?>
    </ul>
    <form method="post" action="">
        <input type="hidden" name="method" value="post">
        <div class="inputDiv" name="titlediv">
            <input class="input" type="text" name="title" placeholder="Title...">
        </div>
        <div class="inputDiv" name="descrdiv">
            <input class="input" type="text" name="description" placeholder="Description...">
        </div>
        <button  class="add-button" type="submit">+</button>
    </form>

</body>
</html>