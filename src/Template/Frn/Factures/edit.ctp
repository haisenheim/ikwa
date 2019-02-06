<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $facture->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $facture->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Factures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fournisseurs'), ['controller' => 'Fournisseurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fournisseur'), ['controller' => 'Fournisseurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Points'), ['controller' => 'Points', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Point'), ['controller' => 'Points', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="factures form large-9 medium-8 columns content">
    <?= $this->Form->create($facture) ?>
    <fieldset>
        <legend><?= __('Edit Facture') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('fournisseur_id', ['options' => $fournisseurs]);
            echo $this->Form->input('point_id', ['options' => $points]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
