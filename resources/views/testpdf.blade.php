<!DOCTYPE html>
<html >
<head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>

    

    <script src="{{ asset('js/popper.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="https://use.fontawesome.com/1844c64849.js"></script>
  <title>Relevé de Notes</title>

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


    </style>
   
</head>
<body >
<img src="../public/img/entete.png" class="img-rounded" alt="Cinque Terre" width="700" height="120">

<div style="border: 1px solid #000000; text-align: center"><h4><B class="">RELEVÉ DE NOTES</B></h4></div>

<div class="form-group col-md-6 p-1" >
                                <b>{{Auth::user()->nom}}&nbsp;{{Auth::user()->prenom}}
                                </b><br>
                                
        Né : le <?php
                                setlocale (LC_TIME,'fr_FR.utf8','fra');
                                echo utf8_encode(strftime(" %d %B %Y",strtotime(Auth::user()->naissance)));

                                ?><br>
                       
                        @foreach($data['diplome'] as $diplome)
                                         
                            
                            <b>inscrit(e) en : </b>{{$diplome->niveau}} {{$diplome->libelle}}<br>
                                    
                                    
                                        
                                     @endforeach
                                     
         
        


                            </div>

<table class="table table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                
                                <th class="w-50 h-10"></th>
                                <th >Note</th>
                                <th >Resultat</th>
                                <th >Session</th>
                                <th >Crédits</th>
                                
                            
                            </tr>
                            </thead>
                            <tbody id='cTable'>
                            
                             @if(count($data['ue'])>=1)
                             
                             
                                @foreach($data['semestre'] as $semestre)
                                <tr > 
                                        
                                        <FONT size="1pt">
                                        <td class="w-25"><B>SEMESTRE{{$semestre->id_semestre}}</B></td>
                                        <td></td> 
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        </FONT>
                                  
                                    </tr>
                                    @foreach($data['ue'] as $ue)
                                         @if($ue->id_semestre==$semestre->id_semestre)

                                     <tr class=" clk_tgl"> 
                                        
                                        <FONT size="1pt">
                                        <td class="w-25"><B>{{$ue->libelle}}</B></td>
                                        <td></td> 
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        </FONT>
                                  
                                    </tr>
                                    
                                    
                                         @endif
                                     @endforeach
                                @endforeach
                                
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <br>
                    
                               
                           

</body>
</html>