<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <div class="form-buttons">
        <?= $this->Form->submit(__('Login'), ['class' => 'action-button']) ?>
        <?= $this->Html->link("Registrar", ['action' => 'add'], ['class' => 'button-secondary']) ?>
    </div>
</div>
