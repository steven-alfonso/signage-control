<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Announcement Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $image_url
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property int $announcement_type_id
 * @property bool $event
 * @property string $event_location
 * @property \Cake\I18n\Time $event_start
 * @property \Cake\I18n\Time $event_end
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AnnouncementType $announcement_type
 */
class Announcement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
