<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paiement $paiement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paiement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paiements form large-9 medium-8 columns content">
    <?= $this->Form->create($paiement) ?>
    <fieldset>
        <legend><?= __('Edit Paiement') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('total');
            echo $this->Form->control('percu');
            echo $this->Form->control('reste');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
