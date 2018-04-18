<?php 
require('mysqli_connect.php');
$query = "SELECT count(recipe_id), recipe_id FROM `recipe-diet` GROUP BY recipe_id ";

$result = mysqli_query($myconn, $query);
$output = [];
while($row = mysqli_fetch_assoc($result)){
    $output[]=$row;
}
$count = count($output);
$repeatedRecipes = [];
for($i=0; $i<$count; $i++){
    if($output[$i]['count(recipe_id)']>1){
        $repeatedRecipes[]=$output[$i]['recipe_id'];
        // $repeatedRecipes[]=$output[$i]['count(recipe_id)'];
        // $soloRecipe = [];
        // $soloRecipe[]=$output[$i]['recipe_id'];
        // $soloRecipe[]=$output[$i]['count(recipe_id)'];
        // $repeatedRecipes[]=$soloRecipe;
    }
}
print_r($repeatedRecipes);
$query2 = "SELECT ID, recipe_id FROM `recipe-diet` WHERE ";
forEach($repeatedRecipes as $value){
    $query2.= "recipe_id = $value OR ";
};
$query2 = substr($query2, 0, -3);
$query2 .= "ORDER BY recipe_id";
// print($query2);
$result2 = mysqli_query($myconn, $query2);

$output2 = [];
while($row = mysqli_fetch_assoc($result2)){
    // $indivRecipe=[];
    // $indivRecipe[]=
    $output2[] = $row;
}
$count = count($output2);
$IDsToRemove=[];
for($i = 0; $i<$count; $i++){
    if($output2[$i]['recipe_id']===$output2[$i+1]['recipe_id']){
        $IDsToRemove[]=$output2[$i]['ID'];
    }
}
// Print_r($IDsToRemove);


$DELETEQuery = "DELETE FROM `recipe-diet` WHERE ";
forEach($IDsToRemove as $value){
    $DELETEQuery.= "ID = $value OR ";
};
$DELETEQuery = substr($DELETEQuery, 0, -3);
// mysqli_query($myconn, $DELETEQuery);
?>