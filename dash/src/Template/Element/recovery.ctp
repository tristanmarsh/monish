<!-- File: src/Template/Element/recovery.ctp -->

<div class="container">

    <div class="row">

        <!-- <div class="col-sm-6 col-sm-offset-3 panel wow fadeInDown"> -->
        <div class="panel log-in-window col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

            <div class="panel-body">
                
                <div class="logo">
                    <?= $this->Html->image('logo-monish.png', ['alt' => 'Monash International Student House','class' => 'img-responsive img-center','width'=>'200px'])  ?>
                    <h1 class="text-center">Monash ISH Dashboard</h1>
                </div>

				<?= $this->Flash->render() ?>
				
                <div>

                    <div role="tabpanel" class="tab-pane fade in" id="account-recovery">

                        <?php if (!$this->Session->read('Auth.User')) : ?>
                            
                            <?php echo $this->Form->create('User', ['action' => 'forgot_password', 'novalidate' => true]); ?>

                            <?= $this->Flash->render('auth') ?>

                            <?= $this->Form->create() ?>

                            <hr>

                            <fieldset>

                                <!-- <legend></legend> -->

                                <!-- email address -->   
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="username" name="username" id="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>          


                            </fieldset>
                            
                            <br>

                            <?= $this->Form->button('<i class="fa fa-paper-plane"></i> Send Recovery Email', ['class' => 'form-control button button-large button-3d button-block button-rounded button-action','escape' => false]); ?>

                            <?= $this->Html->link(
                              '<i class="glyphicon glyphicon-log-in"></i> Login',
                              ['action' => 'login'],
                              ['class' => 'form-control button button-small button-block button-rounded button-warning', 'escape' => false]
                            ); ?>

                            <?= $this->Form->end() ?>

                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>