<!-- src/Template/Users/reset_password.ctp -->


<h1>Reset Password</h1>

<div class="panel panel-default clearfix">
    <div class="panel-body">
        
        <div class="users form">
            <?= $this->Form->create($user, ['novalidate' => true]) ?>
            <fieldset>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->button('Submit', ['type' => 'submit', 'class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </fieldset>
        </div>
    </div>
</div>