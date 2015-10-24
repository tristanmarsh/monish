<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb($giraffe->title);

?>
<h1><?= $giraffe->title; ?></h1>

<div class="panel panel-default panel-actionbar clearfix">

  <div class="panel-body">

    <div class="button-set">
      <?= $this->Html->link(
      '<i class="fa fa-paper-plane"></i> All',
      ['action' => 'index'],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    </div>

    <?= $this->Html->link(
    '<i class="fa fa-plus"></i> New Request',
    ['action' => 'add'],
    ['class' => 'button button-pill button-action', 'escape' => false]
    ); ?>

  </div>

  <div class="panel-footer">

      <?= $this->Html->link(
      '<i class="fa fa-eye"></i> View',
      ['action' => 'view', $giraffe->id],
      ['class' => 'button button-pill button-primary active', 'escape' => false]
      ); ?>

      <?= $this->Html->link(
      '<i class="fa fa-pencil"></i> Edit',
      ['action' => 'edit', $giraffe->id],
      ['class' => 'button button-pill button-primary', 'escape' => false]
      ); ?>
    
      <?= $this->Form->postLink(
      '<i class="fa fa-times"></i> Close',
      ['controller'=>'requests', 'action' => 'delete', $giraffe->id],
      ['confirm' => 'Close ' . $giraffe->title .' Request from '. /* $giraffe->person->first_name . " " . $giraffe->person->last_name .*/ '?' , "escape" => false,
        'class' => 'button button-pill button-caution',
        'escape' => false
      ]
      ); ?>

  </div>

</div>

<?php 
  if (!($giraffe->avatar_directory === NULL)) {
    $directory = substr($giraffe->avatar_url, 5);
} ?>

<?php if ($giraffe->avatar_directory) : ?>
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">
              <?= h($giraffe->title) ?>
            </h2>
          </div>
          <div class="panel-body">
            <?= $this->Html->image($directory, ['alt' => 'CakePHP', 'class' => 'img img-responsive img-center']); ?>
          </div>
        </div>
      </div>


    <div class="col-sm-6">
      <div class="panel panel-primary">
  <?php else : ?>
      <div class="panel panel-primary">
  <?php endif; ?>

    <!-- Default panel contents -->
    <div class="panel-heading">
        <h2 class="panel-title">Request Detail</h2>
    </div>


<table>

    <tr>
      <td>Title: <?= h($giraffe->title) ?></td>
    </tr>

    <tr>
      <td>Category: <?= h($giraffe->category) ?></td>
    </tr>
    <tr>
      <td>Property: <?= h($giraffe->property_address) ?></td>
    </tr>
    <tr>
      <td><?= h($giraffe->description) ?></td>
    </tr>
<!-- <tr>
<td> <?php echo $this->Html->link('changestatus', ['action' => 'changestatus', $article->id]);

?></td>
</tr> -->

    <tr>
      <td>
          <!-- Tristan's Adorable/Gravatar Avatar Script -->
          <?php
            $email = $lion->person->email;
            $emailHash = md5( strtolower( trim( $email ) ) );

            $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
            $defaultImageQuery = urlencode($defaultImageQuery);

            $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
            
            $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';

            echo $gravatarImage;
          ?>

          <?= h($lion->person->first_name)?> <?= h($lion->person->last_name)?>
      </td>
    </tr>

</table>

<div class="panel-footer">
    <span>Created: <?= $giraffe->created->format('d M Y H:i:s') ?></span>
</div>

  </div>
      <?php if ($giraffe->avatar_directory) : ?>
  </div>
  </div>
    <?php else : ?>
  </div>
    <?php endif; ?>



