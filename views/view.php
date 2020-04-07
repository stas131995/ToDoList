<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
</head>
<body>
    <?php if (isset($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <p><?=$error?></p>
        <?php endforeach ?>
    <?php endif ?>

    <div class="header">
        <h2>My To Do List</h2>
    </div>
    <ul id="myUL">
        <?php foreach ($todoItems as $model) : ?>
            <li class="<?= $model->getDone() ? 'checked' : '' ?>">
                    <table style="width:100%">
                        <tr>
                            <form method="post" action="">
                                <input type="hidden" name="method" value="patch">
                                <input type="hidden" name="id" value="<?= $model->getId() ?>">
                                <button class="Mrow" style="text-align: left;width:95%;border:none;font-size:20px;background-color: transparent;"  type="submit">
                                    <?= $model->getTitle()."--".$model->getDescription()."--".$model->getCreatedDate() ?>
                                </button>
                            </form>
                        </tr>
                        <tr>
                            <form method="post" action="">
                                <input type="hidden" name="method" value="delete">
                                <input type="hidden" name="id" value="<?= $model->getId() ?>">
                                <button  style="padding: 0; border: none;background-color: transparent;" type="submit"><img src="image/remove.png" /></button>
                            </form>
                        </tr>
                    </table>

                </li>
        <?php endforeach ?>
    </ul>
    <form method="post" action="">
        <input type="hidden" name="method" value="post">
        <div name="inputs">
            <input style="width:35%;text-align:centre;" type="text" name="title" placeholder="Title...">
            <input style="width:35%;text-align:centre;" type="text" name="description" placeholder="Description...">
        </div>
        <button  style="margin-left:50%" type="submit"><img src="https://img.icons8.com/color/48/000000/add.png"/></button>
    </form>

</body>
</html>