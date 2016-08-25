<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement Type'), ['action' => 'edit', $announcementType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement Type'), ['action' => 'delete', $announcementType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcementType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcement Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcementTypes view large-9 medium-8 columns content">
    <h3><?= h($announcementType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($announcementType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $announcementType->has('user') ? $this->Html->link($announcementType->user->id, ['controller' => 'Users', 'action' => 'view', $announcementType->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcementType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($announcementType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($announcementType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Announcements') ?></h4>
        <?php if (!empty($announcementType->announcements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Subtitle') ?></th>
                <th><?= __('Text') ?></th>
                <th><?= __('Image Url') ?></th>
                <th><?= __('Announcement Type Id') ?></th>
                <th><?= __('Start') ?></th>
                <th><?= __('End') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($announcementType->announcements as $announcements): ?>
            <tr>
                <td><?= h($announcements->id) ?></td>
                <td><?= h($announcements->user_id) ?></td>
                <td><?= h($announcements->title) ?></td>
                <td><?= h($announcements->subtitle) ?></td>
                <td><?= h($announcements->text) ?></td>
                <td><?= h($announcements->image_url) ?></td>
                <td><?= h($announcements->announcement_type_id) ?></td>
                <td><?= h($announcements->start) ?></td>
                <td><?= h($announcements->end) ?></td>
                <td><?= h($announcements->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Announcements', 'action' => 'view', $announcements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Announcements', 'action' => 'edit', $announcements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Announcements', 'action' => 'delete', $announcements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
