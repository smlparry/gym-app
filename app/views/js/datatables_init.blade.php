<script>

	$(document).ready(function(){
	    $('#data_table').DataTable({
	    	 "oLanguage": { "sSearch": "" },
	    	 "bInfo" : false,
	    	 "iDisplayLength": 25
	    });

	    // Add the placeholder with 
	    $('.dataTables_filter input').attr("placeholder", "Search Records");
	});

</script>