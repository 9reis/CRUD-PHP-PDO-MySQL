<?php

    $mensagem = '';

    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success' : 
                $mesagem = '</div class="alert alert-success"> Ação executada com sucesso!</div>';
                break;
            
            case 'error' : 
                $mesagem = '</div class="alert alert-danger"> Ação não executada!</div>';
                break;
            
        }
    }

    $resultados = '';

    foreach($vagas as $vaga){
        $resultado .=
        '<tr>
            <td>' .$vaga->id . '</td>
            <td>' .$vaga->titulo . '</td>
            <td>' .$vaga->descricao . '</td>
            <td>' .$vaga->ativo =='s' ? 'Ativo' : 'inativo' . '</td>
            <td>' .date('d/m/y à\s H:i:s', strtotime($vaga->data)) . '</td>
            <td>' .$vaga->acoes . '</td>
            <td>
                <a href="editar.php?id= '.$vaga->id.'"> 
                <button type="button" class="btn btn-primary"> Editar </button> 
                </a>

                <a href="excluir.php?id= '.$vaga->id.'"> 
                <button type="button" class="btn btn-danger"> Excluir </button> 
                </a>
            </td>
        </tr>';        
    }

    $resultados = strlen($resultados) ?$resultados : 
    '<tr>
        <td colspan="6" class="text-center"> Nenhuma vaga encontrada </td>;
    </tr>';
?>

<main>

    <?php $mensagem ?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success mt-4">Nova Vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php $resultados ?>
            </tbody>

        </table>
    </section>
   
    
    

</main>