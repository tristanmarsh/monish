<!-- src/Template/People/add.ctp -->

<div class="users form">
    <?php 

    echo $this->Form->input('properties_id',array(
 
    'id' => 'properties_id',
 
    'empty' =>''));
 
	echo $this->Form->input('room_id',array(
 
    'id' => 'room_id',
 
    'empty' =>''));
    ?>
</div>

<?php
 
//AJAX for Dynamic Drop down
 
$this->Js->get('#country_id')->event('change',
 
    $this->Js->request(array(
 
        'controller'=>'countries',
 
        'action' =>'get_by_country',
 
    ), array(
 
        'update' =>'#city_id',
 
        'async' => true,
 
        'method' => 'Post',
 
        'dataExpression'=>true,
 
        'data'=> $this->Js->serializeForm(array(
 
                'isForm' => true,
 
                'inline' => true
 
            ))
 
    ))
 
);
 
// END AJAX
 
?>
<a name="more"></a>