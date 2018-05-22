$query1 = "SELECT * FROM equipos";
					$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());
					while ($row = pg_fetch_row($resultado)) {
							echo "$row[0]<br>";
							echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="100" width="150"/><br>';
					}