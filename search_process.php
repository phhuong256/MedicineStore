<?php
class Search {	
   
	private $productTable = 'product_details';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }

	public function product() {	
		$limit = '5';
		$page = 1;
		if($_POST['page'] > 1) {
		  $start = (($_POST['page'] - 1) * $limit);
		  $page = $_POST['page'];
		} else {
		  $start = 0;
		}
	
		$sqlQuery = "SELECT * FROM ".$this->productTable;
		if($_POST['searchQuery'] != ''){
		  $sqlQuery .= ' WHERE name LIKE "%'.str_replace(' ', '%', $_POST['searchQuery']).'%" ';
		}
		$sqlQuery .= ' ORDER BY id ASC';

		$filter_query = $sqlQuery . ' LIMIT '.$start.', '.$limit.'';	
	
		$statement = $this->conn->prepare($sqlQuery);			
		$statement->execute();
	
		$result = $statement->get_result();
		$totalSearchResults =  $result->num_rows;	
	
		$statement = $this->conn->prepare($filter_query);			
		$statement->execute();
	
		$result = $statement->get_result();
		$total_filter_data = $result->num_rows;
		
		$resultHTML = '
			<label>Total Search Result - '.$totalSearchResults.'</label>
			<table class="table table-striped table-bordered">
			  <tr>
				<th>ID</th>
				<th>Product Name</th>
			  </tr>';
	
		if($totalSearchResults > 0) {	  
		  while ($product = $result->fetch_assoc()) { 	
			$resultHTML .= '
			<tr>
			  <td>'.$product["id"].'</td>
			  <td>'.$product["name"].'</td>
			</tr>';
		  }
		} else {
		  $resultHTML .= '
		  <tr>
			<td colspan="2" align="center">No Record Found</td>
		  </tr>';
		}

		$resultHTML .= '
		</table>
		<br />
		<div align="center">
		  <ul class="pagination">';

		$totalLinks = ceil($totalSearchResults/$limit);
		$previousLink = '';
		$nextLink = '';
		$pageLink = '';	

		if($totalLinks > 4){
		  if($page < 5){
			for($count = 1; $count <= 5; $count++){
			  $pageData[] = $count;
			}
			$pageData[] = '...';
			$pageData[] = $totalLinks;
		  } else {
			$endLimit = $totalLinks - 5;
			if($page > $endLimit){
			  $pageData[] = 1;
			  $pageData[] = '...';
			  for($count = $endLimit; $count <= $totalLinks; $count++)
			  {
				$pageData[] = $count;
			  }
			} else {
			  $pageData[] = 1;
			  $pageData[] = '...';
			  for($count = $page - 1; $count <= $page + 1; $count++)
			  {
				$pageData[] = $count;
			  }
			  $pageData[] = '...';
			  $pageData[] = $totalLinks;
			}
		  }
		} else {
		  for($count = 1; $count <= $totalLinks; $count++) {
			$pageData[] = $count;
		  }
		}

		for($count = 0; $count < count($pageData); $count++){
		  if($page == $pageData[$count]){
			$pageLink .= '
			<li class="page-item active">
			  <a class="page-link" href="#">'.$pageData[$count].' <span class="sr-only">(current)</span></a>
			</li>';

			$previousData = $pageData[$count] - 1;
			if($previousData > 0){
			  $previousLink = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previousData.'">Previous</a></li>';
			} else {
			  $previousLink = '
			  <li class="page-item disabled">
				<a class="page-link" href="#">Previous</a>
			  </li>';
			}
			$nextData = $pageData[$count] + 1;
			if($nextData > $totalLinks){
			  $nextLink = '
			  <li class="page-item disabled">
				<a class="page-link" href="#">Next</a>
			  </li>';
			} else {
			  $nextLink = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$nextData.'">Next</a></li>';
			}
		  } else {
			if($pageData[$count] == '...'){
			  $pageLink .= '
			  <li class="page-item disabled">
				  <a class="page-link" href="#">...</a>
			  </li>';
			} else {
			  $pageLink .= '
			  <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$pageData[$count].'">'.$pageData[$count].'</a></li>';
			}
		  }
		}
		
		$resultHTML .= $previousLink . $pageLink . $nextLink;
		$resultHTML .= '</ul></div>';
		echo $resultHTML;
	}	
}
?>