<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
        <tr>
        <td>다음 항목을 수정해주세요:</td>
            <td><ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $form->encode($error) ?></li>
                <?php } ?>
            </ul></td>
    <?php }  ?>
    <tr>
    <tr><td>이름:</td><td><?= $form->input('text', ['name' => 'name']) ?></td></tr>
    <tr><td>전화번호:</td><td><?= $form->input('text', ['name' => 'phone']) ?></td></tr>
    <tr><td>선호 메뉴:</td>
        <td><?= $form->select($dishes,['name' => 'dish_id']) ?></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?= $form->input('submit', ['name' => 'add',
                             'value' => '고객 등록']) ?></td>
    </tr>
</table>
</form>
