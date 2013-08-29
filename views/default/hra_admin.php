<?php
$debug = ($_SERVER['SERVER_NAME']=='1127.0.0.1')?true: false;
$user_role = roles_get_role();
$role= $user_role->get("title");
$hrainfo = (array) H2hra::getHraStatMembers();
 if($_SERVER['SERVER_NAME']=='127.0.0.1') var_dump($hrainfo);
echo $role.'<br />';

?>
<style>

    .hra-table { width: 95%;border-collapse: separate; border-spacing:0 5px;}
    .hra-table tr {margin: 5px;vertical-align: middle; background-color: #d2e3ec;}


</style>
<script>
    function showQuestions() {
        $( "#questions" ).dialog();
    }
    function patchQuestions(){
        jQuery.ajax({
            url: '<?=elgg_add_action_tokens_to_url("action/hra/patch_questions")?>',
            type : "json",
            success : function(data){
                    alert(data);
                }
            }
        )
    }
</script>

<button class="'elgg-submit-button" onclick="showQuestions();">Update HRA Questions </button>  <br />
<button class="'elgg-submit-button" onclick="patchQuestions();">Patch HRA Questions </button>  <br />
<br />
HRA Status <br />
<table class="hra-table">
    <th>User ID</th><th>HRA ID</th><th>date</th><th>bmi</th><th>bmr</th><th>diet plan</th><th>calories goal</th><th>strength level</th><th>fitness level</th>
    <th>vo2_max</th>
    <?php
    foreach($hrainfo as $stat){
        echo '<tr><td>'.$stat->shn_user_id.'</td><td>'.$stat->shn_hra_id.'</td> <td>'.$stat->date.'</td>';
        echo '<td>'.$stat->bmi.'</td><td>'.$stat->bmr.'</td><td>'.$stat->diet_plan.'</td><td>'.$stat->calories_goal.'</td><td>'.$stat->strength_level.'</td><td>'.$stat->fitness_classification_level.'</td>';

        echo '<td>'.$stat->vo2_max.'</td>  <td>';
        echo '</td></tr>';
    }
    ?>
</table>



<div id="questions" title="Basic dialog" style="display:none;">
    <p>TEST.  NOT YET</p>
</div>
