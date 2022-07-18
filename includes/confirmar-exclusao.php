<main>
   

    <h2 class="mt-4"> Excluir vaga </h2>

    <form action="" method="POST">

        <div class="form-group">
            <p>Voce deseja realmente excluir a vaga <strong><?php $obVaga->titulo ?></strong> ?</p>
        </div>

        

        <div class="form-group">
        <a href="index.php">
            <button type="button" class="btn btn-danger ">Cancelar</button>
        </a>
            <button type="submit" name="excluir" class="btn btn-success"> Excluir </button>
        </div>

    </form>
</main>
