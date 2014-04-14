<table class="table">
    <tr>
        <td>Information about termination eployment.</td>
    </tr>
    <tr>
        <td><?php echo $this->Html->link('Terminate employment',
                    array('controller' => 'staffs', 'action' => 'terminate', $staff['Staff']['id']),
                    array('class' => 'btn btn-danger', 'id'=>'terminate'), "Are you shure to terminate this employment") ?></td>
    </tr>
</table>