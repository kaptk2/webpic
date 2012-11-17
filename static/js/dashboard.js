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
			alert('You should delete ' + ui);
		}
	});
});

