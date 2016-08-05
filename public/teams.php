<?php
require __DIR__ . '/../src/Input.php';

function pageController()
{
   
   $teams = Input::get('teams');
   $page = Input::get('page', 1);

   if ($page < 1) {
   		$page = 1;
   }

   $query = Input::get('team_or_stadium');
   $sort = Input::get('sort_by');
   $offset = ($page - 1) * 5;

	$sql = "SELECT * FROM teams";


	if (Input::has('team_or_stadium')) {
		
		$sql .= " WHERE (name LIKE '%$query%') OR (stadium LIKE '%$query%')";
	}

	if (Input::has('sort_by')) {
		
		$sql .= " ORDER BY $sort ASC;";
	}

	if (Input::has('page')) {
    // Add a LIMIT and an OFFSET clause, suppose the size of each page is 5

		$sql .= " WHERE LIMIT 5 OFFSET $offset";



}


	var_dump($sql);

	return [
		'title' => 'Teams',
		'query' => $query,
		'sort' => $sort,
	];
}
extract(pageController());
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../partials/head.phtml' ?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<header class="page-header">
				<h1>Teams</h1>
			</header>
		</div>
		<div class="col-md-4" style="padding-top: 3.5em">
			<form class="form-inline" method="get">
				<div class="form-group">
					<input
						type="text"
						class="form-control"
						id="team"
						name="team_or_stadium"
						placeholder="Team or Stadium">
				</div>
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search" aria-hidden="true">
					</span>
					Search
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<form method="post" action="delete-teams.php">
			<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
      <th>Delete</th>
      <th>
          <a href="?sort_by=team">Team</a>
      </th>
      <th>
          <a href="?sort_by=stadium">Stadium</a>
      </th>
      <th>
          <a href="?sort_by=league">League</a>
      </th>
  </tr>
  </thead>
  <tbody>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="2">
      </td>
      <td>
          <a href="team-details.php?team_id=2">
              Texas Rangers
          </a>
      </td>
      <td>Global Life Park</td>
      <td>American</td>
  </tr>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="1">
      </td>
      <td>
          <a href="team-details.php?team_id=1">
              Baltimore Orioles
          </a>
      </td>
      <td>Oriole Park</td>
      <td>American</td>
  </tr>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="1">
      </td>
      <td>
          <a href="team-details.php?team_id=1">
              Boston Red Sox
          </a>
      </td>
      <td>Fenway Park</td>
      <td>American</td>
  </tr>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="1">
      </td>
      <td>
          <a href="team-details.php?team_id=1">
              Chicago White Sox
          </a>
      </td>
      <td>U.S. Cellular Field</td>
      <td>American</td>
  </tr>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="1">
      </td>
      <td>
          <a href="team-details.php?team_id=1">
              Arizona Diamondbacks
          </a>
      </td>
      <td>Chase Field</td>
      <td>National</td>
  </tr>
  <tr>
      <td>
          <input type="checkbox" name="teams[]" value="1">
      </td>
      <td>
          <a href="team-details.php?team_id=1">
              Atlanta Braves
          </a>
      </td>
      <td>Turner Field</td>
      <td>National</td>
  </tr>
  </tbody>
</table>
			<button type="submit" class="btn btn-danger">
				<span class="glyphicon glyphicon-trash"></span>
				Delete
			</button>
			<a href="new-team.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus"></span>
				Add a new team
			</a>
		</form>
	</div>
</div>
<?php include '../partials/scripts.phtml' ?>
</body>
<tfoot>
  <tr>
      <td colspan="4">
          <!-- The values in this pagination control indicate you're currently viewing page 2 -->
          <nav aria-label="Page navigation" class="text-center">
              <ul class="pagination">
                  <li>
                      <a href="?page=1" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                      </a>
                  </li>
                  <li><a href="?page=1">1</a></li>
                  <li><a href="?page=2">2</a></li>
                  <li><a href="?page=3">3</a></li>
                  <li><a href="?page=4">4</a></li>
                  <li><a href="?page=5">5</a></li>
                  <li>
                      <a href="?page=3" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                      </a>
                  </li>
              </ul>
          </nav>
      </td>
  </tr>
</tfoot>
</html>