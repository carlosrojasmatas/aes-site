<?php use_stylesheet('login.css') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Login - AES</title>

    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
</head>
<body class="login">

<form method="post" action="<?php echo url_for( 'auth/login' ) ?>" class="login">

    <h2>AES Login</h2>

<?php if (sfContext::getInstance()->getUser()->hasFlash("login_not_valid")): ?>
    <p class="fail"><?php echo sfContext::getInstance()->getUser()->getFlash("login_not_valid") ?></p>
<?php endif; ?> 

    <dl>
        <dt><label<?php echo $form[ 'username' ]->hasError() ? ' class="error"' : '' ?> for="<?php echo $form[ 'username' ]->renderId() ?>">Usuario</label></dt>
        <dd>
            <?php echo $form[ 'username' ]->render(array('class' => 'text')) ?>
<?php if ( $form[ 'username' ]->hasError() ): ?>
            <p class="error"><?php echo $form['username']->getError() ?></p>
<?php endif ?>
        </dd>

        <dt><label<?php echo $form[ 'password' ]->hasError() ? ' class="error"' : '' ?> for="<?php echo $form[ 'password' ]->renderId() ?>">Password</label></dt>
        <dd>
            <?php echo $form[ 'password' ]->render(array('class' => 'text')) ?>
<?php if ( $form[ 'password' ]->hasError() ): ?>
            <p class="error"><?php echo $form['password']->getError() ?></p>
<?php endif ?>
        </dd>

        <dd><input type="submit" class="submit" value="Login" /></dd>
    </dl>
</form>
</body>
</html>