<!-- src/Template/Users/forgot_Password.ctp -->
<?php $this->assign('title', 'I have forgotten my password!'); ?>

<h1>Reset Password</h1>

<div class="panel panel-default clearfix">
    <div class="panel-body">

    <div class="forgot_password form">
        <?php echo $this->Form->create('User', ['action' => 'forgot_password', 'novalidate' => true]); ?>
        <fieldset>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <?php echo $this->Form->input('username',['class' => 'form-control',
                                                           'placeholder' => 'Enter username',
                                                           'label' => false]);?>
                </div>
            </div>
            <div class="form-group">
                <?= $this->Form->button('Recover', ['type' => 'submit', 'class' => 'btn btn-lg btn-info btn-block']) ?>
                <?php echo $this->Form->end();?>
            </div>
        </fieldset>
    </div>
    </div>
    </div>
