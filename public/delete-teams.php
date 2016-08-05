<?php
require __DIR__ . '/../src/Input.php';

function pageController()
{
    $teams = Input::get('teams', []);  

    $ids = implode(',', $teams);





    //  var_dump($teams);
    // foreach ($teams as $teamId) {
    //     Generate the DELETE statement for each team_id
        $delete = 'DELETE FROM teams WHERE id = IN ($ids)';
    //     Copy and paste the statements in SQL PRO and verify theyre correct.
    //     var_dump($delete);
    // }

    // In a real scenario you would normally redirect to the list of teams.
    // header('Location: teams.php');
}
pageController();