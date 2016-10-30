<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index()
    {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null)
    {
        // if (is_null($id)) {
        //     $this->set('post', '$id が指定されていないよ！指定して！');
        // }

        // $post = $this->Post->findById($id); // $post = array();
        // if (!$post) { // $post == false, $post == '', $post == array()
        //     $this->set('post', '存在しない $id を指定しているよ！不正だよ！');
        // } else {
        //     $this->set('post', $post);
        // }
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                // $this->Flash->success(__('Your post has been <br>saved.'));
                $this->Flash->success("Your post has been <br>saved.");
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }

    public function edit($id = null)
    {
        if (!$id || !$post = $this->Post->findById($id)) {
            throw new NotFoundException('Invalid access');
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Congrats! Success!');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error('Sorry, failed...');
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Flash->success('Safely deleted.' . $id);
        } else {
            $this->Flash->error('Cannot delete.' . $id);
        }
        return $this->redirect(array('action' => 'index'));
    }
}
