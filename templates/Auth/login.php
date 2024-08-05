<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->layout = 'frontend';
$this->assign('title', 'Login');
?>
<section id="login-form">
    <div class="login-container">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Auth', 'action' => 'login'], 'class' => 'login-form']) ?>
        <h2>Login</h2>
        <?= $this->Flash->render() ?>
        <div class="input-group">
            <label for="email">Email</label>
            <?= $this->Form->control('email', [
                'type' => 'email',
                'required' => true,
                'label' => false,
                'value' => $debug ? "test@example.com" : "",
                'id' => 'email',
            ]); ?>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <?= $this->Form->control('password', [
                'type' => 'password',
                'required' => true,
                'label' => false,
                'value' => $debug ? 'password' : '',
                'id' => 'password',
            ]); ?>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'forgetPassword']) ?>" class="forget-password">Forgot password?</a>
        <br>
        <?= $this->Form->button('Login', ['class' => 'login-button']) ?>
        <br><br>
        <span class="register-message">Don't have an account? <a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'register']) ?>" class="register">Register here</a></span>
        <?= $this->Form->end() ?>
    </div>
</section>


