<?php
$recipeIDQuery="SELECT recipe_id FROM `recipe-allergy` LIMIT 25 OFFSET 375";
$recipeResults=mysqli_query($localCon,$recipeIDQuery);
$recipeIDArray=[];
while($row = mysqli_fetch_assoc($recipeResults)){
    $recipeIDArray[]=$row['recipe_id'];
};
print_r($recipeIDArray);

// $id=$recipeIDArray[0];

require __DIR__ . '/vendor/autoload.php';
use RapidApi\RapidApiConnect;
function fillDatabase($id){
    require('mysqli_conn.php');
    $rapid = new RapidApiConnect('ding_5abd42cae4b084deb4eac1cd', '/connect/auth/ding_5abd42cae4b084deb4eac1cd');
    Unirest\Request::verifyPeer(false);
    $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/".$id."/information?includeNutrition=true",
    array(
        "X-Mashape-Key" => "ctPBKJeb9MmshN8R3JwGbc9RxXhgp1lBAx0jsnYrEYZq29XdRS",
        "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
    )
    );
    $returnedItems = json_decode($response->raw_body, true);
    // print_r($returnedItems);
    // exit();


    $title = $returnedItems['title']; //title
    $imgURL = $returnedItems['image']; //url

    if($returnedItems['vegetarian']===true){
        $vegetarian=1;
    } else{
        $vegetarian=0;
    }
    if($returnedItems['vegan']===true){
        $vegan=1;
    } else{
        $vegan=0;
    }
    if($returnedItems['glutenFree']===true){
        $glutenFree=1;
    } else{
        $glutenFree=0;
    }
    if($returnedItems['dairyFree']===true){
        $dairyFree=1;
    } else{
        $dairyFree=0;
    }
    if($returnedItems['ketogenic']===true){
        $ketogenic=1;
    } else{
        $ketogenic=0;
    }


    $readyInMinutes=$returnedItems['readyInMinutes'];
    $unparsedIngredients = $returnedItems['extendedIngredients'];

    $dietQuery = "INSERT INTO `recipe-diet` 
                (`recipe_id`, `title`, `image`, `vegetarian`, `vegan`, `glutenFree`, `dairyFree`, `ketogenic`, `readyInMinutes`)
                VALUES ('$id', '$title', '$imgURL', '$vegetarian', '$vegan', '$glutenFree', '$dairyFree', '$ketogenic', '$readyInMinutes')";

    /**FILL DIET TABLE */
    $dietResult = mysqli_query($conn, $dietQuery);


    $ingredlength = count($unparsedIngredients);
    $ingredientsArray=Array(); //ingredients
    $ingredientsQuantity=Array(); //quantity of each ingredient
    $ingredientsUnit=Array(); //unit of measurement

    for($i = 0; $i<$ingredlength; $i++){
    $ingredientsArray[]=$unparsedIngredients[$i]['name'];
    $ingredientsQuantity[]=$unparsedIngredients[$i]['amount'];
    $ingredientsUnit[]=$unparsedIngredients[$i]['unit'];
    }

    $ingredientsQuery = "INSERT INTO `ingredients` (recipe_id, ingredient, amount, unit_type) VALUES ";
    for($i = 0; $i< $ingredlength; $i++){
        $ingredientsQuery.="('$id', '$ingredientsArray[$i]', '$ingredientsQuantity[$i]', '$ingredientsUnit[$i]'),";
    }
    $ingredientsQuery=substr($ingredientsQuery, 0,-1);


    /**FILL INGREDIENTS TABLE */
    $ingResult = mysqli_query($conn, $ingredientsQuery);

    $unparsedSteps = $returnedItems['analyzedInstructions'][0]['steps'];
    $stepsLength = count($unparsedSteps);
    $stepNumbers=[]; //step numbers
    $step=[]; //the actual instruction
    for($x=0; $x<$stepsLength; $x++){
    $stepNumbers[] = $unparsedSteps[$x]['number'];
    $step[] = $unparsedSteps[$x]['step'];
    }



    $instructionsQuery = "INSERT INTO `instructions` (recipe_id, step_num, step) VALUES ";
    for($i = 0; $i< $stepsLength; $i++){
        $instructionsQuery.="('$id', '$stepNumbers[$i]', '$step[$i]'),";
    }
    $instructionsQuery=substr($instructionsQuery, 0, -1);
    // print($instructionsQuery);

    /**FILL INSTRUCTIONS TABLE */
    $instResult = mysqli_query($conn, $instructionsQuery);
}
//lookup recipes by ID
for($j=0; $j<25; $j++){
    $id=$recipeIDArray[$j];
    fillDatabase($id);
}
fillDatabase($id);
?>
