$(document).ready(function(){
	$(".btn-del").click(function(){
		var info = JSON.parse($(this).val());

		$(".popup-wrapper").show();
		$(".confirm-popup").show();

		$("#show_yaer").html(info.year);
		$("#show_semester").html(info.semester);
		$("#show_subj_id").html(info.subj_id);
		$("#show_subj_name").html(info.name);

		$("#id-key").val(info.subj_id)
		$("#year-key").val(info.year)
		$("#sem-key").val(info.semester)
	});

	$(".popup-wrapper").click(function(){
		$(".popup-wrapper").hide();
		$(".confirm-popup").hide();
	});

	$(".btn-cancel").click(function(){
		$(".popup-wrapper").hide();
		$(".confirm-popup").hide();
	});
});