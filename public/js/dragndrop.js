var count = 0;
function drop(){
    $( ".draggable" ).draggable({
        cursor: 'move',
        revert: 'true',
        stack: '.draggable',
        contain: '#droppableArea'
    });

    $( "#droppableArea" ).droppable({
        drop: function( event, ui ) {
            var posLeft = ui.position.left;
            var posTop = ui.position.top;

            console.log("Element with id " + $(".draggable").attr("id") + "'s  " + "position-x: " + posLeft + " and position-y: " + posTop);

            $.ajax({
                method: "post",
                dataType: "json",
                url: "<?= URL ?>/garden/saveDroppablePosition",
                data: { posLeft: posLeft, posTop: posTop }
            })
            .done(function(data){
            });
        },
    });

    $( "#remove" ).droppable({
        drop: function( event, ui ) {
            ui.helper.destroy();
        }
    });
};
