@extends('layouts.app')

@section('css')
    <style>
        .nav-item:nth-child(2) a {
            color: white !important;
        }

        .headliste
        {
            background-color: #c0c0c038;
            cursor:pointer;
        }

        .noValideUE
        {
            color:red !important;
        }

        .tlt_mat
        {
            padding-left:30px !important;
        }

        #topdown i
        {
            font-weight:bold; font-size:25px;
        }

    </style>
@endsection


@section('content')
    <div class="">
        <div class="container">
            <div class="row">
                <div class="px-5 m-5">
                    <div class="row">
                        <!-- <div class="d-flex justify-content-between w-100"> -->
                            <div class="form-group col-md-6 p-1" >
                                <h2  value="{{Auth::user()->id}}" id="connect">{{Auth::user()->nom}}
                                  {{Auth::user()->prenom}}
                                </h2>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-4 p-1">
                                        <select class="form-control" id="ann">
                                            <option>--ANNEE--</option>
                                              @foreach($data as $annee)
                                            <option value="{{$annee->id_annee}}">{{$annee->libelle}} Année</option>
                                     @endforeach 
                                            
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 p-1">
                                        <select class="form-control" id="dip">
                                            <option value="0">--DIPLOME--</option>
                                           
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 p-1">
                                        <select class="form-control" id="sem">
                                            <option value="">--SEMESTRE--</option>
                                           
                                           
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        <!-- </div> -->
                        <table class="table lesUe">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th  id="topdown"><i class="fa fa-angle-down"></i> <i class="fa fa-angle-up"></i></th>
                                <th class="w-50">UE</th>
                                <th >Coef</th>
                                <th >Note</th>
                                <th >Session</th>
                                <th >Resultat</th>
                                
                            
                            </tr>
                            </thead>
                            <tbody id='cTable'>

                             
            
            
                            </tbody>
                        </table>
                    
                    <section class="card cTable1">
                        <div class="card-header bg-dark text-white" >
                            Relevé de Notes
                        </div>

                        <div class="card-body">

                        <table class="table " >
                            <thead  >
                            <tr>
                                
                                <th class="w-50">Année</th>
                                <th class="w-50">Diplome</th>
                                <th class="w-50">Resultat</th>
                                
                            
                            </tr>
                            </thead>

                            <tbody id='cTable2'>
                                <tr  class="headliste clk_tgl"> 
                                        
                                        
                                        <td class="w-50">2016</td>
                                        <td>MASTER S2i</td>
                                        <td><a href="#">lien</a></td> 
                                        
                                  
                                    </tr>

                             
            
            
                            </tbody>
                        </table>
                        </div>
                    </section>

                    </div>
                    <br>
                    <div class="row p-1 enbas" style="border-top: solid silver 1px;">
                        <div class="d-flex justify-content-between w-100">
                            <legend  id="legende" style="font-size: 20px;color: #000; padding-top: 5px;">
                                Moyenne Générale : 10.97  / 20.00
                            </legend>
                            <a href="{{ url('test') }}"><button class="btn btn-primary d-flex align-items-center">Télécharger le bulletin <i class="ml-2 fa fa-download"></i></button></a>
                        </div>
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
            // Cacher les filliers par defaut
            $('.cTable1').hide();
            $('#legende').html("");

            $('.default_hide').hide();
            //$('.fa-minus').hide();
            $('.fa-angle-up').hide();

            // $('.clk_tgl').on('click', function(){
            //      var idHeadLine=$(this).attr('id');
                
            //     // $(this).find(".fa-plus,.fa-minus").toggle();
            //      $('.tbl_tgl_'+idHeadLine).toggle();

            // });

            $('#topdown').on('click',function(){

                 $('.default_hide').toggle();
                 //$(".fa-plus,.fa-minus").toggle();
                 $(this).find(".fa-angle-down,.fa-angle-up").toggle();

            });


            $("#cTable",'').on("click", ".clk_tgl", function (event) {
        
var rr = $(this).closest('tr').find('td .icon');

                 var idHeadLine=$(this).attr('id');

                
                 $('.tbl_tgl_'+idHeadLine).toggle();

            

   
  if ( rr.is( ".fa-plus" ) ) {
    
    rr.removeClass('fa-plus');
    rr.addClass('fa-minus');
   
  } else {
    
    rr.removeClass('fa-minus');
    rr.addClass('fa-plus');
    
  }

});

        });

///////////////////ACTION SUR LE CHANGEMENT D'ANNEE/////////////
        $('body').on('change','#ann', function(){

         
         var selectedId=$("#ann").val();
         
         // if($.isNumeric(selectedId))
          
         

         
            $.post('changeAnnee',
                  {selectedId:selectedId},
                  function(data){                   
                           
                           $('#dip').html(data);
                           $('#sem').html('<option value="">--SEMESTRE--</option>')
                           if(data=='<option value="">--DIPLOME--</option>'){ 
                            //$('#cTable').empty();
                            

                            
                           
                           }                    
                             },

                            'html'
                          );

         
        
        

      });
/////////////////////////////////////////////////////////////////

///////////////////ACTION SUR LE CHANGEMENT DE SEMESTRE/////////////
        $('body').on('change','#sem', function(){

         
         var selectedId=$(this).val(); 
         //$('.default_hide').hide(); 
            $.post('changeSemestre',
                  {selectedId:selectedId},
                  function(data){
                           
                           $('#cTable').html(data); 
                            $('.default_hide').hide(); 
                            $('.lesUe').show();
                            $('#legende').html("Moyenne du Semestre :   / 20.00");

//                             setTimeout(function(){

//                               var id_ue=$('.ue').map(function(){ return $(this).attr('id');}).get();
//                               $.each(id_ue,function(index,value)
//                               { var sum=0;
//                                 var matiere=$('.mat'+value).text(); 
//                                 sum+=parseInt(matiere);
//                               console.log(sum);
//                               }


//                                 );
                              

                          

//                             // console.log(id_ue);
//                             // console.log(matiere);

// }, 8000);
                            

                             },

                            'html'
                          );
       
      });
/////////////////////////////////////////////////////////

 ///////////////////ACTION SUR LE CHANGEMENT DE DIPLOME////////////

        $('body').on('change','#dip', function(){
        
        $('.cTable1').hide();
         
         var selectedId=$(this).val();
         var selectedAnnee=$('#ann').val();
         console.log(selectedAnnee);  
         
            $.post('changeDiplome',
                  {selectedId:selectedId,selectedAnnee:selectedAnnee},
                  function(data){
                                
                           $('#sem').html(data);
                           $('.enbas').show();
                                  

                                                   
                             },

                            'html'

                          );

            $.post('changeDiplome2',
                  {selectedId:selectedId},
                  function(data){
                             
                           
                         $('#cTable').html(data);
                         $('.default_hide').hide(); 
                         $('.lesUe').show();
                         $('.enbas').show();
                         $('#legende').html("Moyenne Générale :   / 20.00");
                                                   
                             },

                            'html'

                          );

            
      });
//////////////////////////////////////////////////////////////////
    </script>
@endsection