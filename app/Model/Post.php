<?php

class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'message' => 'title は必須ですよ'
            // 'rule' => array('minLength', '8'),
            // 'message' => 'title は8文字以上！'
        ),
        'body' => array(
            'rule' => 'notBlank',
            'message' => 'body は必須ですよ'
        )
    );
}
