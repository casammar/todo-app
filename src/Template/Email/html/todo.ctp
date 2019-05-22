  <table role="presentation" class="main">
    <tr>
      <td class="wrapper">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <p>Hi <?= $user->username ?>,</p>
              <p><?= $task->description ?></p>
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                <tbody>
                  <tr>
                    <td align="left">
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td>
                              <?= $this->Html->link('' . __('View Task'), ['controller' => 'Tasks', 'action' => 'view', '_full' => true, 'target' => '_blank', $task->id], ['escape' => false]) ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
