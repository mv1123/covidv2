<!DOCTYPE html>
<html lang="pt-br">

<head>	
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
        <div class="container">
          
            </br><div class="row">
                <h2>CRUD em PHP <span class="badge badge-secondary">v 1.0.0</span></h2>
               </div>
			<div class="jumbotron-fluid">
			  <div align="center">							  
				  </br><a href="requisicao.php" class="btn btn-primary">CADASTRAR REQUISIÇÃO</a>&nbsp;
				  &nbsp;<a href="retirada.php" class="btn btn-primary">CADASTRAR RETIRADA</a>&nbsp;
				  &nbsp;<a href="create.php" class="btn btn-danger">ANULAR RETIRADA</a>
            </div>
          </div>
            </br>
			</br>
            <div class="row">
                
				<table align="center">					
							<th align="center">REQUISIÇÕES:</th>   					     
				</table>
				<table class="table table-striped">							
                    <thead>	
                        <tr>
							<th scope="col">Id</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Setor requerente</th>
                            <th scope="col">Status</th>
                            <th scope="col">Data(A-M-D H:M:S)</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM requisicaov2 WHERE sexo LIKE "aguardando" ORDER BY data DESC ';
						date_default_timezone_set('America/Sao_Paulo');
						

                        foreach($pdo->query($sql)as $row)
							
                        {
                            echo '<tr>';
			                echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['produto'] . '</td>';
                            echo '<td>'. $row['quantidade'] . '</td>';
                            echo '<td>'. $row['requerente'] . '</td>';
                            echo '<td>'. $row['sexo'] . '</td>';
                            echo '<td>' .$row['data'] . '</td>';
                            echo '<td width=250>';
							
                            /* echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' '; */
							
                            echo '<a align="center" class="btn btn-success" href="finalizareq.php?id='.$row['id'].'">Finalizar</a>';
							
							echo ' ';
							
                            echo '<a align="center" class="btn btn-danger" href="delete.php?id='.$row['id'].'">CANCELAR</a>';
							
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
			</div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
