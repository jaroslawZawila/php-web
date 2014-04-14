<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 */
class PhotosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    function create()
    {
        if(!empty($this->data))
        {
            //Check if image has been uploaded
            if(!empty($this->data['Photo']['photo']['name']))
            {
                $datas = $this->data;
                $file = $this->data['Photo']['photo']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $filename = 'properties/' .  $this->data['Photo']['propertyid'] . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $filename);

                    $datas['Photo']['description'] = $this->data['Photo']['description'];
                    $datas['Photo']['properties_id'] =  $this->data['Photo']['propertyid'];
                    $datas['Photo']['url'] = $filename;

                    //now do the save
                    $this->Photo->create();
                    if ($this->Photo->save($datas)) {
                        $this->Session->setFlash(__('The photo has been saved.'));
                    } else {
                        $this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
                    }
                }else {
                    $this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
                }
            }
        }
        return $this->redirect(array('controller'=>'properties','action' => 'manage', $this->data['Photo']['propertyid']));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Photo->id = $id;

		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Photo cannot be found.'));
		}
		$this->request->onlyAllow('post', 'delete');

        $photo = $this->Photo->find('first', array('conditions' => array('Photo.id' => $id)));
        $file = new File('img/' . $photo['Photo']['url']);

		if ($this->Photo->delete()) {
			$file->delete();
            $this->Session->setFlash(__('The photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'));
		}
        return $this->redirect(array('controller'=> 'properties', 'action' => 'manage', $photo['Photo']['properties_id']));
	}}
