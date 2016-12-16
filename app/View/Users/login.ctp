<div class="row user-form">
    <?php echo $this->Flash->render('auth'); ?>
        <form action="/thefaen/" id="UserLoginForm" method="post" class="login-form">
            <h1>Sign In</h1>
            <?php if(isset($error)){
                echo $error;
            } ?>
                <div class="input text required">
                    <label for="UserUsername">Username</label>
                    <input name="data[User][username]" maxlength="255" type="text" id="UserUsername" required="required"/>
                </div>
                <div class="input password required">
                    <label for="UserPassword">Password</label>
                    <input name="data[User][password]" type="password" id="UserPassword" required="required"/>
                </div>
            <button type="submit" class="login-button">Login</button>
            <div class="register">
                <p>
                    Bạn chưa có tài khoản?
                    Vui lòng click vào
                    <?php echo $this->Html->link(
                        'đây',
                        array('controller' => 'users', 'action' => 'register')
                    ); ?>
                </p>
            </div>
    </form>
</div>