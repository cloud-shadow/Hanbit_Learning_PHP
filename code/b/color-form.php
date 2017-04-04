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
        <td>마음에 드는 색상을 고르세요:</td>
        <td><?= $form->select($colors,['name' => 'color']) ?></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?= $form->input('submit', ['name' => 'set',
                                        'value' => '색상 설정']) ?></td>
    </tr>
</table>
</form>
