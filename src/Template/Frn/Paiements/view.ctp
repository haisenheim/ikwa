<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paiement $paiement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paiement'), ['action' => 'edit', $paiement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paiement'), ['action' => 'delete', $paiement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paiements view large-9 medium-8 columns content">
    <h3><?= h($paiement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($paiement->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $paiement->has('order') ? $this->Html->link($paiement->order->id, ['controller' => 'Orders', 'action' => 'view', $paiement->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $paiement->has('user') ? $this->Html->link($paiement->user->id, ['controller' => 'Users', 'action' => 'view', $paiement->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paiement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($paiement->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percu') ?></th>
            <td><?= $this->Number->format($paiement->percu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reste') ?></th>
            <td><?= $this->Number->format($paiement->reste) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($paiement->created) ?></td>
        </tr>
    </table>
</div>
