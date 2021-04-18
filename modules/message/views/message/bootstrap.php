<div id="noticeModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
	<dl id="messages">
		<?php foreach ($messages as $message) { ?>
			<dd class="<?php echo $message->type ?>">
				<?php echo $message->text ?>
			</dd>
		<?php } ?>
	</dl>
</div>

<script src="<?php echo URL::base();?>js/foundation.min.js"></script>
<script>
$('#noticeModal').foundation('reveal', 'open');
$('button#btn-close').on('click', function() {
  $('#noticeModal').foundation('reveal', 'close');
});
</script>