@extends('layouts.app')

@section('css')

    <style>
        .nav-item:nth-child(2) a {
            color: white !important;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            z-index: 1000;
        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
        .pg1{
            padding:1px;
        }
    </style>
@endsection

@section('content')
    <div class="container" id="couco" style="left: 10px; z-index:1; width:100%; top:60px; display:none ">
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Succès!</strong> Une nouvelle évaluation à été créée.
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-5" style="padding:10px; top:15px;">
                    <div class="row">
                        <div class="col-md-7">

                            <div class="row">
                                
                                <div class="form-group col-md-3 pg1">
                                    <select class="form-control selFilter" id="sel_promo">
                                        <option value="">PROMO</option>
                                        @foreach ($data as $promo)
                                         <option value="{{$promo['id']}}">{{$promo['promo']}}</option>
                                        @endforeach 

                                    </select>
                                </div>

                                <div class="form-group col-md-3 pg1">   
                                    <select class="form-control selFilter" id="sel_semestre">
                                       <option value="">SEMESTRE</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 pg1">
                                    
                                    <select class="form-control selFilter" id="sel_ue">
                                       <option value="">-- UE --</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 pg1">

                                    

                                    <select class="form-control selFilter" id="sel_matiere">
                                        <option value="">-- EC --</option>

                                    </select>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-2">
                            <button  data-target="#modal_tdtpcc" disabled data-toggle="modal" class="btn btn-primary d-flex align-items-center btnevl" type="button"> <i style="    margin-right: 5px;" class="fa fa-plus"></i>   Evaluation</button>
                        </div>



                        <div class="col-md-3  p-0">
                            <div class="input-group">
                                <input type="search" id="search" class="form-control" placeholder="Recherche..." aria-label="Search for...">
                                <button class="btn btn-primary d-flex align-content-center" type="button"> <i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <form class="col-md-12 p-0" id="form_note">
                        <table class="table table-striped specTable">
                            <thead style="color:#fff; background-color:#343a40;">
                            <tr>
                                <th>#</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Session</th>
                                <th>Moyenne</th>
<!--                            <th class="w-20" style="width:20px;">Modifier</th>-->                            
                           </tr>
                            </thead>
                            <tbody id="lstEtud">
    
                            </tbody>
                        </table>
                      
                       </form>  
                        
                       <div class="col-md-6 errMess"></div>
                        <div class="col-md-6 pg1 pull-right">
                         <!-- <button id="publier" class="btn btn-success d-flex align-items-center pull-right" style="margin-left:5px;">Publier</button> -->
                           <button id="svNote" class="btn btn-primary d-flex align-items-center pull-right">Enregistrer les modifications</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="d-flex align-items-center modal-title" style="border-right:solid silver 1px; padding-right:20px; display:inline-block;"><i class="mr-2 fa fa-user-circle "></i> <span class="affNomEtuPop"></span></h5> <span style="margin-left:20px; color: #007bff;" class="tltMat"> Web Semantique</span>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form id="formPopNote">
                        <table class="table table-striped" id="tab">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Coef</th>
                                <th>Note</th>
                            </tr>
                            </thead>

                            <tbody id="ctableNote">

                            </tbody>
                        </table>
                        </form>
                        <h5 style="padding:5px;float:right; display: none;" >Moyenne : <span class="affMoyPop"></span></h5>


                    </div>
                    <div class="modal-footer">
                        <button type="button" id="enrgNote" class="btn btn-default btn-success" data-dismiss="modal" data-toggle="modal" >Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal 2-->
        <div class="modal" id="modal_tdtpcc" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                     <h5 class="tltMat"></h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <form id="formEval" class="modal-body">

                        <table class="table table-striped" id="tab">
                            <thead>
                            <tr>
                                <th>Moy</th>
                                <th>Coef</th>
                                <th><div class="btn btn-primary  btn-sm insertLine" style="float"><i class="fa fa-plus fa-lg d-inline"></i></div></th>
                            </tr>
                            </thead>

                            <tbody id="cTable">

                            </tbody>
                        </table>


                    </form>
                    <div class="modal-footer">

                        <div class="pull-left aff-mess"></div>
                        <button type="button" class="subModalEval btn btn-default btn-success" >Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal text-center" id="coucou">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <p></p>
                    <h5>Enregistrement effectué</h5>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('document').ready(function(){

          var eval = ["TD", "TP", "CC","ORAL","EXAM","SEM"];   

            $('.insertLine').on('click',function(){

              //var test=$('.cgeval').text();
              var evalExiste = $(".cgeval").map(function(){return $(this).text();}).get();
              var evalExistOpt = $(".optE option:selected").map(function(){return $(this).text();}).get();

              //console.log(evalExistOpt);
              var evalDiff=arr_diff(eval,evalExiste);

              var evalDiff=arr_diff(evalDiff,evalExistOpt);

              var options="";

              jQuery.each( evalDiff, function( i, val ) {
                  options+='<option value="'+val+'">'+val+'</option>';
              });

             
              if(evalDiff!="")
              {
                $('#cTable').prepend('<tr><td class="w-25"><select class="form-control optE" name="eval[]" id="">'+options+'</select></td> <td class=""><input type="number" name="coeff[]" class="form-control form-control-sm w-25" min="0" max="5"> </td> <td><i class="fa fa-lg d-inline removeLine fa-trash-o text-danger"></i></td></tr>');
              }

            });

            // SUPRESSION EVALUATION

            $('body').on('click','.removeLine',function(){
                if (confirm("Êtes-vous sûr de vouloir supprimer la ligne ?") == true) {
                    if($(this).hasClass("dbRemoveEval"))
                    {
                        // Traitement Ajx Supression Evaluation Base
                        var idTodelete=$(this).attr("id");
                        //alert(idTodelete);
                        $.post('deleteEval',{idEvalTodelete:idTodelete},function($data){
                            $('#ligne_'+idTodelete).remove();

                            refrechTabNoteEtu();
                        });

                    } else {
                        $(this).parent().parent().remove(); // pour l'autre partie les lignes inserées auto
                    }
                }
            });
        });



        // Charger les semestres en fonction de la promo
        $('body').on('change','#sel_promo', function(){
 
         var idPromo=$(this).val();

           $.post('promofilter',{idPromo:idPromo},
                    
                        function(data){

                           $('#sel_semestre').html(data);

                          },

                            'html'
                          );

           // Reinitialiser les autres select 
           $('#sel_ue').html('<option value="">-- UE --</option>');
           $('#sel_matiere').html('<option value="">-- EC --</option>');
           $('.btnevl').attr('disabled', 'disabled');

           $('#lstEtud').html(' ');
           

        });

        // Charger les UE en fonction du semestre
        $('body').on('change','#sel_semestre', function(){
 
         var idSemestre=$(this).val();

           $.post('semestrefilter',{idSemestre:idSemestre},
                    
                        function(data){

                           $('#sel_ue').html(data);

                          },

                            'html'
                          );

           $('#sel_matiere').html('<option value="">-- EC --</option>');
           $('.btnevl').attr('disabled', 'disabled');
           $('#lstEtud').html(' ');

        });

         // Charger les Matiere en fonction de l'ue
        $('body').on('change','#sel_ue', function(){
 
         var idUe=$(this).val();

           $.post('uefilter',{idUe:idUe},
                    
                        function(data){

                           $('#sel_matiere').html(data);

                          },

                            'html'
                          );

           $('#lstEtud').html(' ');

        });

  // Chargement evaluation en fonction de la matiere selectionnée
        $('body').on('change','#sel_matiere', function(){
 
         var selectedId=$(this).val();
         var name_mat=$("#sel_matiere option:selected").text();

         $('.aff-mess').html(' ');

            // Remplissage tableau evaluation
           $.post('changeMatiere',{selectedId:selectedId},
                    
                        function(data){

                            $('#cTable').html(data);
                            $('.tltMat').html(name_mat);

                             

                          },

                            'html'
                          );
           // activer le button evaluation
           $('.btnevl').removeAttr('disabled');

             

           //recuperer laliste des etudiants et leur note
            refrechTabNoteEtu();


        });  

        // Recherche en live 
        $('body').on('keyup', '#search', function(){

          refrechTabNoteEtu();


        }) ; 

        // Ajax ajout evaluation

        $('body').on('click','.subModalEval', function(){

            var data = $('#formEval').serializeArray();

            var selectedMat=$('#sel_matiere').val();
            
            data.push({name: 'matiere', value: selectedMat});

          $.post('saveEvaluation',data,

              function( response ) {
                $('#cTable').html(response);

                $('.aff-mess').html('<span class="alert alert-success">Evaluation(s) ajoutée(s) avec success</span>');

                refrechTabNoteEtu();
              },

              'html'
              
            
            );


            
        });




        // Clique sur modifier pr chaque etudiant


        $('body').on('click','.mdfIon', function(){

           var id_etu = $(this).find('input[type=hidden]').val();

           var nom_etu = $(this).parent().parent().find('.nom').text();
           var prenom_etu = $(this).parent().parent().find('.prenom').text();
           var moy_etu= $(this).parent().parent().find('.moyenne').text();

           var matiere =$('#sel_matiere').val();

           $('.affMoyPop').html(moy_etu);

           $('.affNomEtuPop').html(prenom_etu+' '+nom_etu);


          $.post('getNoteEvaluation',{code_etudiant:id_etu,matiere:matiere},

              function( response ) {
                $('#ctableNote').html(response);

              },

              'html'
              
            
            );
           


            
        });



        $('body').on('click','#enrgNote',function(){

              var data = $('#formPopNote').serializeArray();

              $.post('saveNoteEtu',data,

              function( response ) {
                   refrechTabNoteEtu();
              },

              'html'
              
            
            );

        });

        // Sauvegarder des notes 


        $('body').on('click','#svNote',function(){

             $('.errMess').html(' ');
              var data = $('#form_note').serializeArray();

              console.log(data);

              $.post('saveNote',data,

              function( response ) {
                   
                   if(response==1)
                   {
                      refrechTabNoteEtu();
                      $('.errMess').html('<div class="alert alert-success">Enregistrement effectué avec succès</div>');


                   }else {
                      $('.errMess').html('<div class="alert alert-danger">Erreur : Veuillez saisir uniquement des nombres ou les termes "ABI" ou "ABJ"</div>');
                   }
              },

              'html'
              
            
            );

            
            
        });


        // Fonction pour raffraichire laliste des etudiant et leurs notes
        function refrechTabNoteEtu()
        {

             //recuperer laliste des etudiants et leur note
           var promo = $('#sel_promo').val();
           var semestre = $('#sel_semestre').val();
           var ue =$('#sel_ue').val();
           var matiere = $('#sel_matiere').val();
           var search= $('#search').val();


           $.post('noteEtu',{promo:promo,semestre:semestre,ue:ue,matiere:matiere,search:search},

                function(data){

                    $('.specTable').html(data);
                },
                'html'   
            );
        }





      function arr_diff (a1, a2) 
      {

          var a = [], diff = [];
          for (var i = 0; i < a1.length; i++) {
              a[a1[i]] = true;
          }
          for (var i = 0; i < a2.length; i++) {
              if (a[a2[i]]) {
                  delete a[a2[i]];
              } else {
                  a[a2[i]] = true;
              }
          }

          for (var k in a) {
              diff.push(k);
          }

          return diff;
      }


$(function() {
  $('body').on('keydown', '.onlyNum', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})



    </script>
@endsection