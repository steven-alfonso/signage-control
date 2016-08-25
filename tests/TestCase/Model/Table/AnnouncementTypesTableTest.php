<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnouncementTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnouncementTypesTable Test Case
 */
class AnnouncementTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnouncementTypesTable
     */
    public $AnnouncementTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.announcement_types',
        'app.users',
        'app.announcements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnnouncementTypes') ? [] : ['className' => 'App\Model\Table\AnnouncementTypesTable'];
        $this->AnnouncementTypes = TableRegistry::get('AnnouncementTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnnouncementTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
