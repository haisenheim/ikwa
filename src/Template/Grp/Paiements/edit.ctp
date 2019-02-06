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
        <li><?= $this->Html->link(__('List Points'), ['controller' => 'Points', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Point'), ['controller' => 'Points', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fournisseurs'), ['controller' => 'Fournisseurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fournisseur'), ['controller' => 'Fournisseurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paiements form large-9 medium-8 columns content">
    <?= $this->Form->create($paiement) ?>
    <fieldset>
        <legend><?= __('Edit Paiement') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('point_id', ['options' => $points]);
            echo $this->Form->input('fournisseur_id', ['options' => $fournisseurs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
