<div id="ajout" class="modal fade" style="min-width: 600px" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajout cours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">UE</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Nom_UE
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">UE1-FONDAMENTAUX-DU-WEB-ET-MOBILE-FA </a>
                                        <a class="dropdown-item"
                                           href="#">UE2-PROGRAMMATION-ORIENTEE-OBJET-DISTRIBUEE </a>
                                        <a class="dropdown-item" href="#">UE3-CONCEPTION-AGILE-FA </a>
                                        <a class="dropdown-item" href="#">UE4-ADMINISTRATION-SYSTEMES-ET-RESEAUX</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Type_UE</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Type
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Cours</a>
                                        <a class="dropdown-item" href="#">TD</a>
                                        <a class="dropdown-item" href="#">TP</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Enseignant</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Nom_Enseignant
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Vittori</a>
                                        <a class="dropdown-item" href="#">Nivet</a>
                                        <a class="dropdown-item" href="#">Delhom</a>
                                        <a class="dropdown-item" href="#">Bisgambiglia</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Salle</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Salle
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">111</a>
                                        <a class="dropdown-item" href="#">112</a>
                                        <a class="dropdown-item" href="#">113</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Remarque</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="remarque" name="remarque" class="form-control"
                                           placeholder="Enter une remarque"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Heure de début</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="heure_debut" name="heure_debut" class="form-control"
                                           placeholder="heure_debut"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Heure de fin</h1>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" method="post" action="https://formspree.io/">
                                    <input type="heure_fin" name="heure_fin" class="form-control"
                                           placeholder="heure_fin"></form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="" contenteditable="true">Date</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Date
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">01/02/2018</a>
                                        <a class="dropdown-item" href="#">02/02/2018</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-outline-primary">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outline-primary">Ajouter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>