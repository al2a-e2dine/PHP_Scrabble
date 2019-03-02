<?php 
	if (isset($_POST['submit'])) {
		$input=$_POST['input'];
		$nbr_w=str_word_count($input);
		for ($i=0; $i < $nbr_w; $i++) { 
			$w[$i]=explode(" ",$input)[$i];

			$len[$i]=strlen($w[$i]);
			$score[$i]=0;

			for ($j=0; $j < $len[$i]; $j++) { 
			$var=str_split($w[$i])[$j];
			switch ($var) {
				case "e":case "a":case "i":case "o":case "n":case "r":case "t":case "l":case "s":case "u":case "E":case "A":case "I":case "O":case "N":case "R":case "T":case "L":case "S":case "U":
				$score[$i]=$score[$i]+1;
				break;
				case "d":case "g":case "D":case "G":
				$score[$i]=$score[$i]+2;
				break;
				case "b":case "c":case "m":case "p":case "B":case "C":case "M":case "P":
				$score[$i]=$score[$i]+3;
				break;
				case "f":case "h":case "v":case "w":case "y":case "F":case "H":case "V":case "W":case "Y":
				$score[$i]=$score[$i]+4;
				break;
				case "k":case "K":
				$score[$i]=$score[$i]+5;
				break;
				case "j":case "x":case "J":case "X":
				$score[$i]=$score[$i]+8;
				break;
				case "q":case "z":case "Q":case "Z":
				$score[$i]=$score[$i]+10;
				break;
			}
		}
		}
		


	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scrabble</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Scrabble</h1>
  <p style="text-align:left">Give a variable number of words, create a program to output the word with the maximum score, based on the following scoring system:<br>The score of a word is calculated based on its character values, according to this table:<br>e, a, i, o, n, r, t, l, s, u are equal <b>1</b> point<br>d, g <b>2</b> points<br>b, c, m, p <b>3</b> points<br>f, h, v, w, y <b>4</b> points<br>k <b>5</b> points<br>j, x <b>8</b> points<br>q, z <b>10</b> points<br><br>The max length of a word is 10 letters.<br><br><b>For example:</b><br>input { "This",  "is", "a", "cool" , "Challenge" }<br>output : Challenge
  </p> 
</div>
  
<div class="container">
	<form action="index.php" method="post">
		<div class="form-group">
		  <label for="usr">Input :</label>
		    <?php 
				if (isset($input)) {
			?>
			<textarea class="form-control" rows="5" name="input"><?= $input ?></textarea>
			<?php
				}else{
			?>
			<textarea class="form-control" rows="5" name="input">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
			<?php		
				}
			 ?>
		  
		</div>
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-block">
	</form>
	<br>
    		<?php 
				if (isset($nbr_w)) {
			?>
			<h2>Output :</h2>            
			  <table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Word</th>
			        <th>Length of a word</th>
			      </tr>
			    </thead>
			    <tbody>
			<?php
					for ($i=0; $i < $nbr_w; $i++) { 
						if ($score[$i]==max($score) AND $len[$i]<=10) {
							//echo "max ".$w[$i]." ".$score[$i]."<br>";
							echo '
							<div class="alert alert-success">
							  <strong>Word : </strong> '.$w[$i].' <strong>Highest point : </strong>'.$score[$i].' points
							</div>
							';
						}
					}

					for ($i=0; $i < $nbr_w; $i++) { 
						if ($len[$i]>10) {
							echo '
							<div class="alert alert-danger">
							  <strong>Word : </strong> '.$w[$i].' <strong>The max length of a word is 10 letters.</strong>
							</div>
							';
						}
					}

					for ($i=0; $i < $nbr_w; $i++) {
						echo "
						<tr>
					        <td>".$w[$i]."</td>
					        <td>".$score[$i]." points</td>
					    </tr>
						";
					}
				}
			?>
	</tbody>
  </table>
</div>
</body>
</html>
