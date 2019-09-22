(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

	$('#tblAction').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [4,5] }
		],
		"pageLength": 100
	  });

	  $('#tblDepartment').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [4,5] }
		],
		"pageLength": 100
	  });
	  $('#tblAdmin').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [7,8] }
		],
		"pageLength": 100
	  });
	  $('#tblRequest').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [10,11] }
		],
		"pageLength": 100
	  });
	  $('#tblVendor').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [5,6] }
		],
		"pageLength": 100
	  });

		$('#tblBlogComments').dataTable( {
		"columnDefs": [
		  { "orderable": false, "targets": [4,6] }
		],
		"pageLength": 100
	  });


	$("#admindepartment").change(function(){
		if($("#admindepartment").val() != ""){
			window.location.replace("/admin/assign/"+$("#admindepartment").val());
			$('#assign').removeClass("d-none")
		}else{
			$('#assign').addClass("d-none");
		}
	});
})();
