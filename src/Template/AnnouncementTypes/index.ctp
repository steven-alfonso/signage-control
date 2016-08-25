<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Announcement Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcementTypes index large-9 medium-8 columns content">
    <h3><?= __('Announcement Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcementTypes as $announcementType): ?>
            <tr>
                <td><?= $this->Number->format($announcementType->id) ?></td>
                <td><?= h($announcementType->name) ?></td>
                <td><?= $announcementType->has('user') ? $this->Html->link($announcementType->user->id, ['controller' => 'Users', 'action' => 'view', $announcementType->user->id]) : '' ?></td>
                <td><?= h($announcementType->created) ?></td>
                <td><?= h($announcementType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcementType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcementType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcementType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementType->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
