<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
<table>
    <?php if ($errors) { ?>
        <tr>
            <td>다음 항목을 수정해주세요.:</td>
            <td><ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= $form->encode($error) ?></li>
                <?php } ?>
            </ul></td>
    <?php }  ?>

    <tr><td>첫 번째 수:</td><td><?= $form->input('text', ['name' => 'num1']) ?></td></tr>
    <tr><td>연산자:</td>
        <td><?= $form->select($GLOBALS['ops'], ['name' => 'op']) ?></td>
    </tr>
    <tr><td>두 번째 수:</td><td><?= $form->input('text', ['name' => 'num2']) ?></td></tr>

    <tr><td colspan="2" align="center"><?= $form->input('submit', ['value' => '계산하기']) ?>
    </td></tr>

</table>
</form>
