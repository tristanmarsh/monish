<!-- File: src/Template/Element/login.ctp -->

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

          <div role="tabpanel" class="tab-pane fade in active" id="log-in">

            <?php if (!$this->Session->read('Auth.User')) : ?>

              <?= $this->Flash->render('auth') ?>

              <?= $this->Form->create('Model',array('id' => 'login')) ?>

              <hr>

              <fieldset>
                <!-- <legend>Please enter your username and password</legend> -->

                <!-- username --> 
                <div class="form-group">
                  <label for="username">Username</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="username" name="username" id="username" class="form-control" placeholder="Username">
                  </div>
                </div>      

                <!-- pasword -->  
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                </div>

              </fieldset>

              <br>
              
              <!-- if error Logging in -->
              <?php if ( isset($loginerror) and $loginerror = 'tryagain' ) :?>

                <?= $this->Form->button('<i class="glyphicon glyphicon-log-in"></i> Login',
                  ['class' => 'form-control button button-large button-3d button-block button-rounded button-action', 'escape' => false]
                ); ?>

                <?= $this->Html->link(
                  '<i class="fa fa-archive"></i> Account Recovery',
                  ['action' => 'forgot_password'],
                  ['class' => 'form-control button button-small button-block button-rounded button-warning', 'escape' => false]
                ); ?>
                
              <!-- Standard login -->
              <?php else :?>

                <?= $this->Form->button('<i class="glyphicon glyphicon-log-in"></i> Login',
                ['class' => 'form-control button button-large button-3d button-block button-rounded button-action']); ?>

              <?php endif; ?>

              <?= $this->Form->end() ?>

            <?php endif; ?>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>