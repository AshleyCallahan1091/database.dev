<?php
require __DIR__ . '/../src/Input.php';
function pageController()
{
    $teams = [];
    if (Input::has('league')) {
        SELECT id, name FROM teams
        WHERE league = 'national';

        SELECT * FROM games AS g
        JOIN teams AS ht 
            ON g.local_team_id = ht.id
        JOIN teams AS at
            ON at.visitor_team_id = at.id
        WHERE (ht.league = 'american' OR at.league = 'american')
        OR (ht.league LIKE '%Rangers%' OR at.league = '%Rangers%')

        $selectTeams = "";
 
        var_dump($selectTeams);
        
    }
    // The player's identifier should be in the query string
    $teamId = Input::get('player_id');
    SELECT p.name, t.name, t.league 
    FROM players AS p
        JOIN teams AS t
        ON t.id = p.team_id
        WHERE p.id = 3;

    SELECT name FROM players
    WHERE id = 3;
    $sql = '';
    var_dump($sql);
    return [
        'title' => 'Chris Young',
        'teams' => $teams,
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
                <div class="page-header"><h1>Chris Young</h1></div>
                <?php include '../partials/player-form.phtml' ?>
            </div>
        </div>
        <?php include '../partials/scripts.phtml' ?>
    </body>
</html>