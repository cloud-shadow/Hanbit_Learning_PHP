<p>현재 시각 <?php echo $when->format("g:i a") ?>, 주문 가능 메뉴</p>
<ul>
<?php foreach ($what as $item) { ?>
<li><?php echo $this->escapeHtml($item) ?></li>
<?php } ?>
</ul>