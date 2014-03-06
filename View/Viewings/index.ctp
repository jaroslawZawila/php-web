<div class="viewings index">
	<h2><?php echo __('Viewings'); ?></h2>
	<table class="table" cellpadding="0" cellspacing="0">
        <?php foreach ($viewings as $viewing): ?>
        <tr>
            <td><?php echo h($viewing['Viewing']['id']); ?>&nbsp;</td>
            <td><?php echo $viewing['Customers']['firstname'] . ' ' , $viewing['Customers']['surname']?></td>
            <td><?php echo $viewing['Properties']['houseno'] . ', ' . $viewing['Properties']['street'] . ', ' . $viewing['Properties']['city'] . ', ' . $viewing['Properties']['postcode'] ?></td>
            <td><?php echo h($viewing['Viewing']['status']); ?>&nbsp;</td>
            <td><?php echo h($viewing['Viewing']['date']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('Manage'), array('action' => 'edit', $viewing['Viewing']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
	</table>
