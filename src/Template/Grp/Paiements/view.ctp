<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paiement'), ['action' => 'edit', $paiement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paiement'), ['action' => 'delete', $paiement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Points'), ['controller' => 'Points', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Point'), ['controller' => 'Points', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fournisseurs'), ['controller' => 'Fournisseurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fournisseur'), ['controller' => 'Fournisseurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paiements view large-9 medium-8 columns content">
    <h3><?= h($paiement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($paiement->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Point') ?></th>
            <td><?= $paiement->has('point') ? $this->Html->link($paiement->point->name, ['controller' => 'Points', 'action' => 'view', $paiement->point->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fournisseur') ?></th>
            <td><?= $paiement->has('fournisseur') ? $this->Html->link($paiement->fournisseur->name, ['controller' => 'Fournisseurs', 'action' => 'view', $paiement->fournisseur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($paiement->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($paiement->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($paiement->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Offre Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Payee') ?></th>
                <th><?= __('Date Paie') ?></th>
                <th><?= __('Point Id') ?></th>
                <th><?= __('Versee') ?></th>
                <th><?= __('Date Verse') ?></th>
                <th><?= __('Paiement Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($paiement->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->name) ?></td>
                <td><?= h($reservations->offre_id) ?></td>
                <td><?= h($reservations->user_id) ?></td>
                <td><?= h($reservations->quantity) ?></td>
                <td><?= h($reservations->created) ?></td>
                <td><?= h($reservations->payee) ?></td>
                <td><?= h($reservations->date_paie) ?></td>
                <td><?= h($reservations->point_id) ?></td>
                <td><?= h($reservations->versee) ?></td>
                <td><?= h($reservations->date_verse) ?></td>
                <td><?= h($reservations->paiement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
