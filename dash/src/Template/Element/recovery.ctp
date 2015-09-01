<!-- File: src/Template/Element/login.ctp -->

<div class="container">

    <div class="row">

        <!-- <div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown"> -->
        <div class="panel log-in-window col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

            <div class="panel-body">
                
                <div class="logo">
                    <?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'img-responsive img-center','width'=>'200px'])  ?>
                </div>

                <h1 class="text-center">Monash ISH Dashboard</h1>
				
				<?= $this->Flash->render() ?>
				
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" ><a href="#log-in" aria-controls="log-in" role="tab" data-toggle="tab" style="padding-top:0;padding-bottom:0;"><?= $this->Html->link('Login', ['action' => 'login']) ?></a></li>
                        <li role="presentation"class="active"><a href="#account-recovery" aria-controls="account-recovery" role="tab" data-toggle="tab">Account Recovery</a></li>
                    </ul>

                        <div role="tabpanel" class="tab-pane fade in" id="account-recovery">

                            <?php if (!$this->Session->read('Auth.User')) : ?>
                                <div class="users form">
                                    
                                    <?php echo $this->Form->create('User', ['action' => 'forgot_password', 'novalidate' => true]); ?>
                                    <fieldset>
                                        <?php echo $this->Form->input('username',['class' => 'form-control',
                                                                    'placeholder' => 'Enter email address',
                                                                    'label' => 'Username']);?>
                                    </fieldset>
                                    <br>

                                    <?= $this->Form->button(__('Send Recovery Email'), ['class' => 'form-control btn btn-primary']); ?>
                                    <?= $this->Form->end() ?>

                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>