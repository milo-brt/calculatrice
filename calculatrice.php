<!doctype html>
<!-- calculatrice.php -->
<html>
	<head>
		<meta charset="utf-8" />
		<title>Une petite calculatrice</title>
		<style type="text/css"> 
			html {
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			
			body {
				text-align: center;
				width: 650px;
			}
			
			h1 {
				color: grey;
				border: 3px blue solid;
			}
			
			p.blue {
				color: blue;
				background-color: #c9e3f8;
			}
			
			p.intro {
				font-style: italic;
			}
			
			p.fin {
				text-align: left;
			}
			
			.calculatrice p.resultat {
				margin: 20px 0px;
			}
			
			.calculatrice {
				background-color: #37acff;
				color: white;
				border-radius: 40px;
				font-size: 25px;
				font-weight: 500;
				padding: 10px 10px;
			}
			
			.calculatrice p {
				margin: 0px;
			}
			
			.calculatrice input[type=submit] {
				margin-top: 40px;
			}
			
			.red {
				color: red;
			}
		</style>
	</head>
	
		<?php 
			function calculatrice($nb1, $nb2, $op) {
				if (is_numeric($nb1) && is_numeric($nb2)) {
					switch($op){
						case("plus"):
							return $nb1 + $nb2;
						case("moins"):
							return $nb1 - $nb2;
						case("div"):
							if($nb2 == 0) {
								return "<span class=\"red\">Erreur : la division par 0 est impossible</span>";
							} else {
								return $nb1 / $nb2;
							}
						case("mult"):
							return $nb1 * $nb2;
						default:
							return "Erreur : opération invalide";
					}
				} else {
					return "<span class=\"red\">Erreur : au moins un des nombres saisi n'est pas un nombre....</span>";
				}
			}
		?>
            
	<body>	
		<h1>Calculatrice</h1>
		<p class="intro blue">Une petite calculatrice minimaliste 
		pour pratiquer la programmation web !<br/>Vous ne pouvez faire 
		qu'une opération entre deux nombres.</p>
		<div class="calculatrice">
			<p>Entrez deux nombres et l'opération choisie :</p>
			<form name="calculatrice" method="get" action="calculatrice.php">
				<p class="param">Nombre 1 : <input type="text" name="nombre1" placeholder="entrez un nombre" value="<?= isset($_GET['nombre1']) ? $_GET['nombre1'] : "" ?>"/></p>
				<select name="operation">
					<option value="plus" <?= isset($_GET['operation']) && $_GET['operation'] == "plus" ? "selected" : "" ?> >+</option>
					<option value="moins" <?= isset($_GET['operation']) && $_GET['operation'] == "moins" ? "selected" : "" ?> >-</option>
					<option value="div" <?= isset($_GET['operation']) && $_GET['operation'] == "div" ? "selected" : "" ?> >/</option>
					<option value="mult" <?= isset($_GET['operation']) && $_GET['operation'] == "mult" ? "selected" : "" ?> >*</option>
				</select>
				<p class="param">Nombre 2 : <input type="text" name="nombre2" placeholder="entrez un nombre" value="<?= isset($_GET['nombre2']) ? $_GET['nombre2'] : "" ?>"/></p>
				<input type="submit" name="action" value="calculer" />
			</form>
			<p class="blue intro resultat">
				<?php 
					if(isset($_GET['nombre1']) && isset($_GET['nombre2']) && isset($_GET['operation'])) {
						echo "Le résultat de ".$_GET['nombre1']." ".$_GET['operation']." ".$_GET['nombre2']." est<br/>".calculatrice($_GET['nombre1'], $_GET['nombre2'], $_GET['operation']);
					}
				?>
			</p>
		</div>
		<p class="fin blue">Les paramètres transmis au serveur via le formulaire sont :<br/>
			<?php 
				foreach($_GET as $k => $v){echo "$k = $v<br/>\n";}
			?>
		</p>
	</body>
</html>
