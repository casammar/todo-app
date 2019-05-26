<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TasksController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TasksController Test Case
 */
class TasksControllerTest extends IntegrationTestCase
{
    /**
     * @var string Task ID
     */
    private $taskId;

    /**
     * @var string User ID
     */
    private $userId;

    /**
     * @var \Cake\ORM\Table Table instance
     */
    private $table;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tasks',
        'app.Users'
    ];

    /**
     * Set up method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->taskId = '1';
        $this->userId = '1';
        $this->table = TableRegistry::get('Tasks');
    }

    /**
     * Tear down method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->table);
        unset($this->taskId);
        parent::tearDown();
    }

    /**
     * Set a session method
     *
     * @return void
     */
    private function withSession()
    {
        $this->session([
            'Auth' => [
                'User' => $this->table->get($this->userId)->toArray(),
            ]
        ]);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/tasks');
        $this->assertResponseOk();
        $this->get('/tasks/index');
        $this->assertResponseOk();
        $this->assertResponseContains('Tasks');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $task = $this->table->get($this->taskId)->toArray();
        $this->get('/tasks/view/' . $this->taskId);
        $this->assertResponseOk();
        $this->assertResponseContains($task['name']);
        $this->assertResponseContains('View Task');
    }

    /**
     * Test create method
     *
     * @return void
     */
    public function testCreate()
    {
      $this->withSession();
      $this->enableCsrfToken();
      $this->enableSecurityToken();
      $data = [
          'user_id' => 1,
          'name' => 'Lorem ipsum dolor sit ametttt',
          'description' => 'Lorem ipsum dolor sit ametttt',
          'status' => 'completed',
          'published' => 1,
          'created' => '2019-05-14 23:36:03',
          'modified' => '2019-05-14 23:36:03'
      ];
      $where = $data;
      $this->get('/tasks/create');
      $this->assertResponseContains('Create Task');
      $this->assertResponseOk();
      $this->post('/tasks/create', $data);
      $this->assertRedirect();
      $query = $this->table->find()->where($where);
      $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->withSession();
        $data = ['name' => 'different task name'];
        $this->get('/tasks/edit/' . $this->taskId);
        $this->assertResponseOk();
        $this->assertResponseContains('Edit Task');
        $this->put('/tasks/edit/' . $this->taskId, $data);
        $this->assertRedirect();
        $entity = $this->table->get($this->taskId);
        $this->assertEquals($data['name'], $entity->get('name'));
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->withSession();
        $taskId = '1';
        $this->delete('/tasks/delete/' . $taskId);
        $this->assertRedirect();
        $query = $this->table->find()->where(['id' => $taskId]);
        $this->assertTrue($query->isEmpty());
    }
}
