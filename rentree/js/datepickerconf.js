var d = new Date();
	var y = d.getFullYear()-18;
	var m = d.getMonth()+1;
	var day = d.getDate();

	var date = y + '/' + m + '/' + day;

	$('#birthday').datetimepicker({
	 timepicker:false,
	 closeOnDateSelect:true,
	 lang:'fr',
	 startDate: date,
	 format:'d/m/Y',
	 maxDate:'+1970/01/01',
	});