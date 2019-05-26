<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;


/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{
    /**
     * @var string User ID
     */
    private $userId;

    /**
     * @var string User Name
     */
    private $userName;

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
        'app.Users',
        'app.Tasks'
    ];

    /**
     * Set up method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->userId = '1';
        $this->userName = 'abc@aol.com';
        $this->table = TableRegistry::get('Users');
    }

    /**
     * Tear down method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->table);
        unset($this->userId);
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
     * Test login method
     *
     * @return void
     */
    public function testLogin()
    {
        $this->get('/users/login');
        $this->assertResponseOk();
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        $this->get('/users/logout');
        $this->assertRedirect();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->withSession();
        $this->get('/users');
        $this->assertResponseOk();
        $this->get('/users/index');
        $this->assertResponseOk();
        $this->assertResponseContains('Users');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/' . $this->userId);
        $this->assertResponseOk();
        $this->assertResponseContains($this->userName);
    }

    /**
     * Test create method
     *
     * @return void
     */
    public function testCreate()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $data = [
            'username' => 'zyx@aol.com',
            'password' => 'testtest' // needs to >= 8 characters
        ];
        $where = $data;
        unset($where['password']);
        $this->get('/users/create');
        $this->assertResponseContains('Create a User');
        $this->assertResponseOk();
        $this->post('/users/create', $data);
        $this->assertRedirect();
        $query = $this->table->find()->where($where);
        //fwrite(STDERR, print_r($query, TRUE));
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
        $data = ['username' => $this->userName];
        $this->get('/users/edit/' . $this->userId);
        $this->assertResponseOk();
        $this->assertResponseContains('Edit User');
        $this->put('/users/edit/' . $this->userId, $data);
        $this->assertRedirect();
        $entity = $this->table->get($this->userId);
        $this->assertEquals($data['username'], $entity->get('username'));
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
        $userId = '1';
        $this->delete('/users/delete/' . $userId);
        $this->assertRedirect();
        $query = $this->table->find()->where(['id' => $userId]);
        $this->assertTrue($query->isEmpty());
    }
}
