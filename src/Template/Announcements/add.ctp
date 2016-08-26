<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Announcement Types'), ['controller' => 'AnnouncementTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Announcement Type'), ['controller' => 'AnnouncementTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements form large-9 medium-8 columns content">
    <?= $this->Form->create($announcement) ?>
    <fieldset>
        <legend><?= __('Add Announcement') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('subtitle');
            echo $this->Form->input('description');
            echo $this->Form->input('image_url');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->input('announcement_type_id', ['options' => $announcementTypes]);
            echo $this->Form->input('event');
            echo $this->Form->input('event_location');
            echo $this->Form->input('event_start', ['empty' => true]);
            echo $this->Form->input('event_end', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
