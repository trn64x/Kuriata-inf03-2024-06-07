<html lang="pl">
<head>
<meta charset="utf-8">
<title>Biblioteka</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Biblioteka w Książkowicach Małych</h1>
</header>
<main>
<section id="lewy">
<h4>Dodaj czytelnika</h4>
<form method="post">
imię:
<input type="text" name="imie">
<br>
nazwisko:
<input type="text" name="nazwisko">
<br>
symbol:
<input type="number" name="symbol">
<br>
<input type="submit" value="Akceptuj">
</form>
<?php
if(isset($_POST['imie']))
{
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$symbol=$_POST['symbol'];
	$p=mysqli_connect("localhost","root","","biblioteka");
	$zap="insert into czytelnicy (imie,nazwisko,kod) values ('$imie','$nazwisko','$symbol')";
	$wynik=mysqli_query($p,$zap);
	echo "Dodano czytelnika: ".$imie." ".$nazwisko;
}

?>
</section>
<section id="srodek">
<img src="biblioteka.png" alt="biblioteka">
<h6>ul. Czytelników &nbsp;15; Książkowice Małe<h6>
<p> <a href="mailto:biuro@bip.pl">Czy masz jakieś uwagi </a></p>
</section>
<section id="prawy">
<h4>Nasi czytelnicy</h4>
<?php
	$p1=mysqli_connect("localhost","root","","biblioteka");
	$zap1="select imie,nazwisko from czytelnicy";
	$wynik1=mysqli_query($p1,$zap1);
	echo '<ol>';
	while($rekord=mysqli_fetch_array($wynik1))
	{
	echo '<li>'.$rekord[0]." ".$rekord[1].'</li>';
	}
	echo'</ol>';
mysqli_close($p1);
?>
</section>
</main>
<footer>
<p>Cwel</p>
</footer>
</body>



</html>