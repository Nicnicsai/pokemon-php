<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// 1st fetch
$jsonData = file_get_contents("https://pokeapi.co/api/v2/pokemon/12");
$data = json_decode($jsonData);

//getting the type of the pokemon (can be written easier?)
$type = $data->types[0]->type->name;

// get random number from 0 till 77 amount of moves
$randomMove = mt_rand(0, count($data->moves));
var_dump($randomMove);

//access to one move
var_dump ($data->moves[$randomMove]->move->name);
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
                     src="https://assets.pokemon.com/assets/cms2/img/misc/countries/be/country_detail_pokemon.png"
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
                        <?php  echo "$data->id"; ?></li>
                    <li><span class="font-weight-bold">Name:</span> <span id="name">
                            <?php  echo "$data->name"; ?>
                        </span></li>
                    <li><span class="font-weight-bold">Type:</span> <span id="type"></span>
                        <?php echo "$type"; ?> </li>
                    <li><span class="font-weight-bold">Height:</span> <span id="height"></span>
                        <?php  echo "$data->height" . " cm" ; ?></li>
                    <li><span class="font-weight-bold">Weight:</span> <span id="weight"></span>
                        <?php  echo "$data->weight" . " kg" ; ?></li>


                </ul>
            </section>
        </div>
        <div class="text-center text-white" id="blueButtons1">
            <div class="blueButton"></div>
            <div class="blueButton"></div>

        </div>
        <div class="text-center text-white" id="blueButtons2">
            <div class="blueButton"></div>
            <div class="blueButton"></div>

        </div>
        <div id="miniButtonGlass4"></div>
        <div id="miniButtonGlass5"></div>
        <div id="barbutton3"></div>
        <div id="barbutton4"></div>
        <div class="text-center font-weight-bold" id="yellowBox1"><span id="prev-name"></span></div>
        <div id="yellowBox2"><span id="img-span"><img id="prev-img" src="" alt=""> </span></div>
        <div id="bg_curve1_right">


        </div>
        <div id="bg_curve2_right"></div>
        <div id="curve1_right"></div>
        <div id="curve2_right">

            <div class="container ">
                <div class="d-flex justify-content-center ">
                    <div class="searchbar">
                        <input id="user-input" class="search_input" type="text" name="" placeholder="Pokemon name/id">
                        <button type=submit id="btn-search" class="search_icon"><i class="fas fa-search"><img
                                        id="icon-search" src="assets/ball.png" alt="icon-search"> </i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



</body>
</html>

