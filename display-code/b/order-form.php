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

    <tr><th>메뉴</th><td>수량</td></tr>
<?php foreach ($products as $code => $name) { ?>
    <tr><td><?= htmlentities($name) ?>:</td>
        <td><?= $form->input('text', ['name' => "quantity_$code"]) ?></td></tr>
<?php } ?>
    <tr><td colspan="2" align="center"><?= $form->input('submit', ['value' => '주문하기']) ?>
    </td></tr>

</table>
</form>