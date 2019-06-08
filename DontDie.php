
<!DOCTYPE HTML>


<html>
<head>
<style>

/*This sets all of these IDs not to display, so that only the content I want to display is displayed.*/
#pinecones, #mulberries, #nothing, #suicide, #turn, #starved, #dehydrated, #sanityDeath{
	display: none;
}

/*This puts a bit of space between all of the other divs and the stats.*/
#stats{
	padding-top: 15px;
}

</style>
</head>
<body>

<!-This div is displayed at the beginning of the game.->
<div id="beginning">
	<p>You've just woken up in a strange world.</p>
	<p>What would you like to do?</p>
	<button onclick="vanText('beginning');findFood()">Scavenge for food.</button>
	<button onclick="vanText('beginning');drinkWater();newTurn()">Drink some water.</button>
	<button onclick="vanText('beginning');takeNap();newTurn()">Take a nap.</button>
	<button onclick="vanText('beginning');commitSuicide()">Commit Suicide.</button>
</div>

<!-This div is displayed at the beginning of every turn except the first.->
<div id="turn">
	<p>What would you like to do next?</p>
	<button onclick="vanText('turn');findFood()">Scavenge for food.</button>
	<button onclick="vanText('turn');drinkWater();newTurn()">Drink some water.</button>
	<button onclick="vanText('turn');takeNap();newTurn()">Take a nap.</button>
	<button onclick="vanText('turn');commitSuicide()">Commit Suicide.</button>
</div>

<!-This div is displayed after you have committed suicide.->
<div id="suicide">
	<p>You've ended it all!</p>
	Game Over!
</div>

<!-This div is displayed when the player finds pinecones(Which is when the findFood function generates a number between 1 and 70)->
<div id="pinecones">
	<p>You've found pinecones!</p>
	<p>Would you like to eat them?</p>
	<button onclick="vanText('pinecones');eatPinecones();newTurn()">Yes</button>
	<button onclick="vanText('pinecones');newTurn()">No</button>
</div>

<!-This div is displayed when the player finds mulberries(Which is when the findFood function generates a number between 95 and 100)->
<div id="mulberries">
	<p>You've found mulberries!</p>
	<p>Would you like to eat them?</p>
	<button onclick="vanText('mulberries');eatMulberries();newTurn()">Yes</button>
	<button onclick="vanText('mulberries');newTurn()">No</button>
</div>

<!-This div is displayed when the player finds nothing(Which is when the findFood function generates a number between 71 and 94)->
<div id="nothing">
	<p>You've found nothing!</p>
	<p>Too bad!</p>
	<button onclick="vanText('nothing');newTurn()">Continue</button>
</div>

<!-This div is displayed when the player's hunger falls below zero.->
<div id="starved">
	<p>You've starved to death!</p>
	<p>Game Over!</p>
</div>

<!-This div is displayed when the player's thirst falls below zero.->
<div id="dehydrated">
	<p>You've dried up like a raisin!</p>
	<p>You are now dead!</p>
	<p>Game Over!</p>
</div>

<!-This div is displayed when the player's sanity falls below zero.->
<div id="sanityDeath">
	<p>You've gone insane and commited suicide!</p>
	<p>Game Over!</p>
</div>

<!-This div displays the the player's stats.->
<div id="stats">
	Hunger: 100 Thirst: 100 Sanity: 100
</div>





<script>

//This initializes the values for all of the stats.
var hunger = 100;
var thirst = 100;
var sanity = 100;

//This function starts a new turn
function newTurn(){
	dropStats();
	ceilingStats();
	checkStats();
    	stillAlive();
	changeStats();
}

//This function takes the div that is passed through it as a parameter off of the screen.
function vanText(div){
	var x = document.getElementById(div);
    	x.style.display = 'none';
}

//This function randomly decides what food item you've found.
function findFood(){
	var food = document.getElementById('nothing');
	var chance = getRandomInt(1,100);
	if(chance<=70){
		food = document.getElementById('pinecones');
	}
	if(chance>=95){
		food = document.getElementById('mulberries');
	}
	food.style.display = 'block';
}

// This function (getRandomInt) was copied from stackoverflow, not written by me
function getRandomInt(min, max) {    return Math.floor(Math.random() * (max - min + 1)) + min;}

//This function forfeits the game.
function commitSuicide(){
	var x = document.getElementById('suicide');
	x.style.display = 'block';
}

//This function has the player eat pinecones
function eatPinecones(){
	hunger = hunger + 25;
}

//This function has the player eat mulberries
function eatMulberries(){
	hunger = 105
}

//This function has the player drink water
function drinkWater(){
	thirst = thirst + 25;
}

//This function has the player take a nap
function takeNap(){
	sanity = 105;
	hunger = hunger - 10;
}

//This function drops the player's stats each turn
function dropStats(){
	hunger = hunger - 5;
	thirst = thirst - 5;
	sanity = sanity - 5;
}

//This function checks to see if the players stats are above zero.
function checkStats(){
	if(hunger<=0){
		var x = document.getElementById('starved');
		x.style.display = 'block';
		vanText('stats');
	}
	if(thirst<=0){
		var y = document.getElementById('dehydrated');
		y.style.display = 'block';
		vanText('stats');
	}
	if(sanity<=0){
		var z = document.getElementById('sanityDeath');
		z.style.display = 'block';
		vanText('stats');
	}
}

//This function checks to see if the player is still alive.
function stillAlive(){
    if(hunger>0&&thirst>0&&sanity>0){
        var a = document.getElementById('turn');
        a.style.display = 'block';
    }
}

//This function takes the stat changes and displays them on the screen.
function changeStats(){
	document.getElementById('stats').innerHTML = "Hunger: " + hunger + " Thirst: " + thirst + " Sanity: " + sanity;
}

//This function makes keeps the stats from going above 100
function ceilingStats(){
	if(hunger>100){
		hunger = 100;
	}
	if(thirst>100){
		thirst = 100;
	}
	if(sanity>100){
		sanity = 100;
	}
}







</script>
</body>
</html>
