$(document).ready(
	function(){
		cancel = function(room_no, cdate){
				$.ajax({
					type: "POST",
					url: "http://localhost/reservation/cancel.php",
					data: { roomno: room_no, date : cdate }
				})
				.done(function(data){
					location.reload();
				});
		};
		reserve = function(room_no){
				$.ajax({
					type: "POST",
					url: "http://localhost/reservation/reserve.php",
					data: { roomno: room_no, date : $('#cdate').val() }
				})
				.done(function(data){
					location.reload();
				});
		};
		$('#cdate').change(function findARoom(){
			$.ajax({
				type: "POST",
				url: "http://localhost/reservation/findARoom.php",
				data: { date: $('#cdate').val() }
			})
			.done(function(data){
				$('#tabs-2 div table').html(data);
			});
		});
	}
);