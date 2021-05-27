$(document).ready(function(){
	searchData(1);
	function searchData(page, searchQuery = '') {
	  $.ajax({
		url:"load_data.php",
		method:"POST",
		data:{search:'search', page:page, searchQuery:searchQuery},
		success:function(data) {
		  $('#searchResult').html(data);
		}
	  });
	}
	$('#searchSection').on('click', '.page-link', function(){
	  var page = $(this).data('page_number');
	  var searchQuery = $('#search').val();
	  searchData(page, searchQuery);
	});
	$('#search').keyup(function(){
	  var searchQuery = $('#search').val();
	  searchData(1, searchQuery);
	});
});