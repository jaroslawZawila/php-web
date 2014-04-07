<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Property', array('action'=>'edit','url'=>'/properties/edit/' . $property['Property']['id'], 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update property information:</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon">Property:</span>
                        <?php echo $this->Form->input('addtype', array('class' => 'form-control',
                                'options' => array( 'sale' => 'for sale', 'let' => 'to let'),
                                'value' => $property['Property']['addtype'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Price</span>
                        <?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => '£1000', 'value' => $property['Property']['price'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Beds:</span>
                        <?php echo $this->Form->input('beds', array('class' => 'form-control',
                                'options' => array( 0 => 'bedsite', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6=> 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
                                'value' => $property['Property']['beds'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Baths:</span>
                        <?php echo $this->Form->input('baths', array('class' => 'form-control',
                                'options' => array( 1 => 1, 2 => 2, 3 => 3, 4 => 4),
                                'value' => $property['Property']['baths'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Garden:</span>
                        <?php echo $this->Form->input('garden', array('class' => 'form-control',
                                'options' => array( 'no' => 'no', 'yes' => 'yes'),
                                'value' => $property['Property']['garden'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Parking:</span>
                        <?php echo $this->Form->input('parking', array('class' => 'form-control',
                                'options' => array( 'no' => 'no', 'yes' => 'yes'),
                                'value' => $property['Property']['parking'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Type:</span>
                        <?php echo $this->Form->input('hometype', array('class' => 'form-control',
                                'options' => array( 'house' => 'house','flat' => 'flat'),
                                'value' => $property['Property']['hometype'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Year of build:</span>
                        <?php echo $this->Form->input('year', array('class' => 'form-control', 'placeholder' => 'Year of build', 'value' => $property['Property']['year'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Featured:</span>
                        <?php echo $this->Form->input('featured', array('class' => 'form-control',
                                'options' => array( 'no' => 'no', 'yes' => 'yes'),
                                'value' => $property['Property']['featured'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Visible:</span>
                        <?php echo $this->Form->input('hide', array('class' => 'form-control',
                                'options' => array( 'no' => 'no', 'yes' => 'yes'),
                                'value' => $property['Property']['hide'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">House no:</span>
                        <?php echo $this->Form->input('houseno', array('class' => 'form-control', 'placeholder' => 'House number',
                                'value' => $property['Property']['houseno'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Street</span>
                        <?php echo $this->Form->input('street', array('class' => 'form-control', 'placeholder' => 'Street, road...',
                                'value' => $property['Property']['street'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">City/Town</span>
                        <?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'City or Town',
                                'value' => $property['Property']['city'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Postcode:</span>
                        <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'Postcode',
                                'value' => $property['Property']['postcode'])); ?>
                    </div>
                    <br/>
                </fieldset>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary'));?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <tr>
        <td><b>Purpose:</b></td>
        <td colspan="3"><?php echo h($property['Property']['addtype']); ?></td>
    </tr>
    <tr>
        <td><b>Beds:</b></td>
        <td><?php echo h($property['Property']['beds']); ?></td>
        <td><b>Baths:</b></td>
        <td><?php echo h($property['Property']['baths']); ?></td>
    </tr>
    <tr>
        <td><b>Parking:</b></td>
        <td><?php echo h($property['Property']['parking']); ?></td>
        <td><b>Garden:</b></td>
        <td><?php echo h($property['Property']['garden']); ?></td>
    </tr>
    <tr>
        <td><b>Price:</b></td>
        <td><?php echo h($property['Property']['price']); ?></td>
        <td><b>Type:</b></td>
        <td><?php echo h($property['Property']['hometype']); ?></td>
    </tr>
    <tr>
        <td><b>Year of build:</b></td>
        <td><?php echo h($property['Property']['year']); ?></td>
        <td><b>Status:</b></td>
        <td><?php echo h($property['Property']['status']); ?></td>
    </tr>
    <tr>
        <td><b>Searchable:</b></td>
        <td><?php echo h($property['Property']['hide']); ?></td>
        <td><b>Featured:</b></td>
        <td><?php echo h($property['Property']['featured']); ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <button class="btn btn-default" data-toggle="modal" data-target="#editModal" id="edit-property">
                Edit
            </button>
        </td>
    </tr>
</table>