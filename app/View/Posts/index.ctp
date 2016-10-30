<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th></th>
        <th></th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td>
        <?php
        echo $this->Html->link(
            'edit',
            array(
                'controller' => 'posts',
                'action' => 'edit',
                $post['Post']['id']
            )
        );
        ?>
        </td>
        <td>
        <?php
        // echo $this->Html->link(
        echo $this->Form->postLink(
            'delete',
            array(
                'controller' => 'posts',
                'action' => 'delete',
                $post['Post']['id']
            ),
            array('confirm' => 'Delete? OK?')
        );
        ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
<div>
<?php
echo $this->Html->link(
    '新規追加',
    array(
        'controller' => 'posts',
        'action' => 'add'
    )
);
?>
</div>