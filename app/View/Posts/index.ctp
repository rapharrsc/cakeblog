<?php
$uid = $this->Session->read('Auth.User.id');
//echo $uid;
$uname = $this->Session->read('Auth.User.username');
//echo $uname;
$urole = $this->Session->read('Auth.User.role');
?>

<h1>Bem-Vindo <?= $uname ?> Nível de acesso: <?= $urole ?></h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Crated By</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php 

    foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['title'],
                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
            </td>
            
            <td>

                <?php
                
                if ($uid === $post['Post']['user_id']) {
                    # code...
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $post['Post']['id']),
                        array('confirm' => 'Are you sure?')
                    );

                    echo $this->Html->tag('span','&nbsp');

                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $post['Post']['id'])
                    );
                }
                
                ?>
            </td>
            
            <td><?php echo $post['Post']['created']; ?></td>

            <td><?php echo $post['Post']['modified']; ?></td>
            <td><?php echo $post['Post']['user_id']; ?></td>
        </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>