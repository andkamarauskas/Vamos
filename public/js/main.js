$(function(){
	$(".js-example-basic-multiple").select2();
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
        autoclose: true
	});

    $('#timeformatExample1').timepicker({ 'timeFormat': 'H:i' });
    $('#timepicker').timepicker({ 'timeFormat': 'H:i' });
    $('#timepicker2').timepicker({ 'timeFormat': 'H:i' });
             

	if (localStorage.getItem('form_departure')) {
        $("#form_departure option").eq(localStorage.getItem('form_departure')).prop('selected', true);
    }

    $("#form_departure").on('change', function() {
        localStorage.setItem('form_departure', $('option:selected', this).index());
    });

    if (localStorage.getItem('form_arrival')) {
        $("#form_arrival option").eq(localStorage.getItem('form_arrival')).prop('selected', true);
    }

    $("#form_arrival").on('change', function() {
        localStorage.setItem('form_arrival', $('option:selected', this).index());
    });

});

