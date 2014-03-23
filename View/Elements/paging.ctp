<?php
    if ($this->request->params['paging']['Requests']['count'] > $this->request->params['paging']['Requests']['limit']) {
        echo '<div class="paging">';
        echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'btn btn-default'), null, array('class' => 'prev disabled btn btn-default'));
        echo $this->Paginator->numbers(array('separator' => '',
                                             'class'=>'btn btn-default',
                                             'currentClass'=>'btn btn-info'));
        echo $this->Paginator->next(__('next') . ' >', array('class' => 'btn btn-default'), null, array('class' => 'next disabled btn btn-default'));
        echo '</div>';
     }
?>
