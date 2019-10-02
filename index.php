<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

/*
//notes from livecode

-declare strict types  > in error > "1" make string of it > because init requires it
- php should come first
-declare as many functions as possible at the top
-require (fetches in memory) => mostly used
-include (only if used inside of if)
- it's good to use diffent files of php for groupwork
- constant is made with define('FULL CAPITALS','url') are global




*/



//TO-DO: case insensitive  || less than four moves


$input = 25;
if (isset($_POST['pokeName'])) {
    $input = $_POST['pokeName'];
}

// if not show "https://assets.pokemon.com/assets/cms2/img/misc/countries/be/country_detail_pokemon.png"

// FETCH ONE
//check 132 less than four moves
$jsonData = file_get_contents("https://pokeapi.co/api/v2/pokemon/$input");
$data = json_decode($jsonData);


//CAROUSEL
$gallery = array();

foreach ($data->sprites as $value) {
    array_push($gallery, $value);
}
//point to end of the array
end($gallery);
//fetch key of the last element of the array (so 7)
$lastElementKey = key($gallery);
//iterate the array

//END CAROUSEL


//getting the type of the pokemon (can be written easier?)
$type = $data->types[0]->type->name;


//IF LESS THAN FOUR MOVES SHOW ONLY AMOUNT

// returns an array of random keys from the array
$random = array_rand($data->moves, 4);
//find four moves  ((make with for each blueButton)
$move1 = $data->moves[$random[0]]->move->name;
$move2 = $data->moves[$random[1]]->move->name;
$move3 = $data->moves[$random[2]]->move->name;
$move4 = $data->moves[$random[3]]->move->name;

// get image source
$imgPokemonFront = $data->sprites->front_default; //src url
//echo "$imgPokemonFront";


$urlEvolution = $data->species->url; //url from evolution


// FETCH TWO
$jsonDataEvolution = file_get_contents("$urlEvolution");
$dataEvolution = json_decode($jsonDataEvolution);


$nameEvolution = $dataEvolution->evolves_from_species->name;





//FETCH THREE

$jsonDataPrev = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nameEvolution");
$dataPrev = json_decode($jsonDataPrev);

$imgPrevEv = $dataPrev->sprites->front_default;

function evolutionExists($dataPrev)
{

    $nameEvolutionCurrent = $dataPrev->species->name; //pichu
    if (is_null($nameEvolutionCurrent) ) {

        echo "Doesn't have evolution";
    } else {
        echo $nameEvolutionCurrent;

    }

}





function evolutionExistsImg($imgPrevEv, $dataPrev)
{
    $nameEvolution = $dataPrev->species->name;

    if (is_null($nameEvolution)) {

        echo "assets/razz-berry.png"; //show berry image
    } else {

        echo $imgPrevEv;
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="http://cdn0.iconfinder.com/data/icons/pokemon-go-vol-2/135/_Pokedex_tool-512.png">


</head>
<body>

<div id="pokedex">
    <div id="left">
        <div id="logo"></div>
        <div id="bg_curve1_left">
        </div>


        <div id="bg_curve2_left"></div>
        <div id="curve1_left">
            <div id="buttonGlass">
                <div id="reflect"></div>
            </div>

            <div id="miniButtonGlass1"></div>
            <div id="miniButtonGlass2"></div>
            <div id="miniButtonGlass3"></div>

            <h1 class="title"> Pokémon </h1>

        </div>
        <div id="curve2_left">
            <div id="junction">
                <div id="junction1"></div>
                <div id="junction2">

                </div>
            </div>
        </div>
        <div id="screen">
            <div id="topPicture">
                <div id="buttontopPicture1"></div>
                <div id="buttontopPicture2"></div>
            </div>
            <div id="picture">
                <img class="rounded" id="img-pokemon"
                     src="<?php echo $imgPokemonFront; ?>"
                     alt="psykokwak" height="160" width="235"/>
            </div>
            <div id="buttonbottomPicture"></div>
            <div id="speakers">
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
            </div>
        </div>
        <div id="bigbluebutton"><span class="col text-center" id="playicon"> ► </span></div>
        <div id="barbutton1"></div>
        <div id="barbutton2"></div>
        <div id="cross">
            <div id="leftcross">
                <div id="leftT"></div>
            </div>
            <div id="topcross">
                <div id="upT"></div>
            </div>
            <div id="rightcross">
                <div id="rightT"></div>
            </div>
            <div id="midcross">
                <div id="midCircle"></div>
            </div>
            <div id="botcross">
                <div id="downT"></div>
            </div>
        </div>
    </div>
    <div id="right">


        <div id="stats">


            <section>
                <ul class="list-unstyled">
                    <li><span class="font-weight-bold">ID:</span> <span id="id-nr"></span>
                        <?php echo "$data->id"; ?></li>
                    <li><span class="font-weight-bold">Name:</span> <span id="name">
                            <?php echo "$data->name"; ?>
                        </span></li>
                    <li><span class="font-weight-bold">Type:</span> <span id="type"></span>
                        <?php echo "$type"; ?> </li>
                    <li><span class="font-weight-bold">Height:</span> <span id="height"></span>
                        <?php echo "$data->height" . " cm"; ?></li>
                    <li><span class="font-weight-bold">Weight:</span> <span id="weight"></span>
                        <?php echo "$data->weight" . " kg"; ?></li>


                </ul>
            </section>
        </div>
        <div class="text-center text-white" id="blueButtons1">
            <div class="blueButton">
                <?php echo "$move1"; ?>
            </div>
            <div class="blueButton"><?php echo "$move2"; ?></div>

        </div>
        <div class="text-center text-white" id="blueButtons2">
            <div class="blueButton"><?php echo "$move3"; ?></div>
            <div class="blueButton"><?php echo "$move4"; ?></div>

        </div>
        <div id="miniButtonGlass4"></div>
        <div id="miniButtonGlass5"></div>
        <div id="barbutton3"></div>
        <div id="barbutton4"></div>
        <div class="text-center font-weight-bold" id="yellowBox1"><span
                    id="prev-name"><?php
                evolutionExists($dataPrev);
                //echo $nameEvolution;

                ?></span>
        </div>
        <div id="yellowBox2"><span id="img-span"><img id="prev-img" src="<?php
                evolutionExistsImg($imgPrevEv, $dataPrev);
                //echo $imgPrevEv;

                ?>" alt=""> </span></div>
        <div id="bg_curve1_right">


        </div>
        <div id="bg_curve2_right"></div>
        <div id="curve1_right"></div>
        <div id="curve2_right">

            <div class="container ">
                <div class="d-flex justify-content-center ">
                    <form class="searchbar" action="index.php" method="post">
                        <input id="user-input" class="search_input" type="text" name="pokeName"
                               placeholder="Pokemon name/id">
                        <button type=submit id="btn-search" class="search_icon"><i class="fas fa-search"><img
                                        id="icon-search" src="assets/ball.png" alt="icon-search"></i></button>

                        <?php /*$_POST["pokeName"] */ ?>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>


</body>
</html>

