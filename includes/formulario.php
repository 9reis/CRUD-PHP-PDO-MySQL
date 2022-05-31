<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success ">Voltar</button>
        </a>
    </section>

    <h2 class="mt-4">Cadastrar Vaga</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" class="form-control">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Status</label>

            <div class=""> 
                <div class="form-check form-check-inline ">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked>Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline ml-2 ">
                    <label class="form-control">
                    <input type="radio" name="ativo" value="n">Inativo
                </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"> Enviar </button>
        </div>

    </form>
</main>
