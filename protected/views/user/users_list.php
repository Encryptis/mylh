<h1>Зарегистрированные пользователи</h1>

<?php foreach($users as $user): ?>
Логин: <?php echo $user->login; ?>
E-mail: <?php echo $user->email; ?>
Дата регистрации: <?php echo date('d.m.Y H:i', $user->register_datetime); ?><br/>
<?php endforeach; ?>

<a href="<?php echo $this->createUrl('user/signup'); ?>">Зарегестрироваться</a>