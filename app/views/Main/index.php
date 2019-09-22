<?php require_once(VIEWS . '/layout/header.php'); ?>

<?php  if(!empty($messages)): ?>
    <?php  foreach($messages as $key => $message):?>
        <div class="ad">
            <div>
                <div class = "image"><img src="<?php echo $message['photo']; ?>" width="80" height="80" alt="lorem"></div>
                <div class="title">Заголовок: <?php echo nl2br(htmlspecialchars($message['title']))?></div>
            </div>
            <div class="message">
                <p>Автор: <?php echo htmlspecialchars($message['name'])?> | Дата: <?php echo $message['date']?></p>
                <p class="text">Описание: </p>
                <?php  if(strlen($message['description']) > 255){
                    $croppedStr = mb_strimwidth($message['description'],0,255);?>
                    <div> <?php echo htmlspecialchars($croppedStr) ?>...</div>
                <?php  }else{ ?>
                    <div> <?php echo htmlspecialchars($message['description'])?></div>
                <?php  } ?>
                <div><p class="email">Email:</p> <?php echo htmlspecialchars($message['email'])?></div>
                <p>Телефон: <?php echo htmlspecialchars($message['phone_number'])?></p>
            </div>
        </div>
    <?php  endforeach; ?>
<?php  endif; ?>
<form action="/save-post" method="post">
    <p>
        <input type="text" name="name" id="name" value="<?php echo ($_POST['name'] ?? ''); ?>" placeholder="Имя">
    </p>
    <p>
        <input type="email" name="email" id="email" value="<?php echo ($_POST['email'] ?? ''); ?>" placeholder="Эл.почта">
    </p>
    <p>
        <input type="text" name="phone_number" id="phone_number" value="<?php echo ($_POST['phone_number'] ?? ''); ?>" placeholder="Номер телефона">
    </p>
    <p>
        <input type="text" name="title" id="title" value="<?php echo ($_POST['title'] ?? ''); ?>" placeholder="Заголовок">
    </p>
    <p>
        <textarea name="description" id="description" placeholder="Описание"></textarea>
    </p>
    <p>
        <input type="text" name="photo" id="photo" placeholder="Ссылка на фото">
    </p>
    <p>
        <input type="number" name="limit" id="limit" placeholder="Кол-во объявлений">
    </p>
    <button>Добавить объявление</button>
</form>
<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(".title").click(function () {
            $(this).closest('.ad').find('.message').slideToggle(100);
        })
    });
</script>
<?php if(isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li>
                <?php echo $error;?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif;?>
<?php require_once(VIEWS . '/layout/footer.php'); ?>
