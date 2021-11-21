<article class="container-fluid">
    <h6 class="leftH6">Container</h6>
    <br>

    <section class="row align-items-start">
        <h3>Projet MVC</h3>
        <p>Ce projet a pour objectif de créer des groupes à partir d'un fichier CSV en passant en paramètre le nombre maximum d'individus par groupe. </p>
        <br><br>

        <div class="col-1"></div>
        <section class="card col-10">
            <h2>Group Generator</h2>
            <hr>
            <section class="card-body">
                <h3 class="card-title">Paramètres groupes</h3>
                <form action="./group" method="post" enctype="multipart/form-data">
                    <article>
                        <h6 class="leftH6">Form article</h6>
                        <section class="form-group">
                            <h6 class="leftH6">Nombre individus</h6>
                            <label for="nbMax">Nombre d'individus par groupe</label>
                            <input type="number" name="nbMax" id="nbMax" class="form-control" required>
                        </section>
                        <section class="form-group">
                            <h6 class="leftH6">Fichier CSV à insérer</h6>
                            <label for="fileEtu">Fichier CSV</label>
                            <input type="file" name="fileEtu" id="fileEtu" accept=".csv" class="form-control" required>
                        </section>
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary float-end">Envoyer</button>
                    </article>
                </form>
            </section>
        </section>
        <div class="col-1"></div>

    </section>
</article>



