$(function() {
	$(".draggable").draggable({
			cancel: "a.ui-icon", // clicking an icon won't initiate dragging
			revert: "invalid", // when not dropped, the item will revert back to its initial position
			containment: "document",
			helper: "clone",
			cursor: "move"
		});
	$("#trash").droppable({
		drop: function( event, ui ) {
			console.log(ui);
			$.ajax({
				url: 'http://csc380.coaldiver.org/carterj/webpic/index.php/dashboard/deletepic',
				type: 'POST',
				data: 'HREF=' + ui.draggable.attr('href')
			});
			ui.helper.effect('transfer', {to: '#trash', className: 'ui-effects-transfer'}, 500);
			ui.draggable.remove();
		}
	});
});

