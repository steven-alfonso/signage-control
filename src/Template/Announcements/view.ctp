<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Announcement'), ['action' => 'edit', $announcement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Announcement'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Announcement Types'), ['controller' => 'AnnouncementTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement Type'), ['controller' => 'AnnouncementTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="announcements view large-9 medium-8 columns content">
    <h3><?= h($announcement->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $announcement->has('user') ? $this->Html->link($announcement->user->id, ['controller' => 'Users', 'action' => 'view', $announcement->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($announcement->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Subtitle') ?></th>
            <td><?= h($announcement->subtitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Announcement Type') ?></th>
            <td><?= $announcement->has('announcement_type') ? $this->Html->link($announcement->announcement_type->name, ['controller' => 'AnnouncementTypes', 'action' => 'view', $announcement->announcement_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Event Location') ?></th>
            <td><?= h($announcement->event_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($announcement->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start') ?></th>
            <td><?= h($announcement->start) ?></td>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= h($announcement->end) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Start') ?></th>
            <td><?= h($announcement->event_start) ?></td>
        </tr>
        <tr>
            <th><?= __('Event End') ?></th>
            <td><?= h($announcement->event_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($announcement->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $announcement->event ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($announcement->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Image Url') ?></h4>
        <?= $this->Text->autoParagraph(h($announcement->image_url)); ?>
    </div>
</div>
