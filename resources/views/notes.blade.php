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
                        <div class="d-flex justify-content-between w-100">
                            <h1 class="">Mark Otto</h1>
                            <div class="form-group col-md-6 pull-right">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="form-control" id="sel2">
                                            <option value="">M1 S2I</option>
                                         
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <select class="form-control" id="sel2">
                                            <option value="">Semestre 1</option>
                                            <option value="">Semestre 2</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th  id="topdown"><i class="fa fa-angle-down"></i> <i class="fa fa-angle-up"></i></th>
                                <th class="w-50">UE</th>
                                <th >Coef</th>
                                <th >Note</th>
                                <th >Resultat</th>
                                
                            
                            </tr>
                            </thead>
                            <tbody>

                             @if(count($data['ue'])>=1)

                                @foreach($data['ue'] as $ue)

                                     <tr id="{{$ue->id_ue}}" class=" headliste clk_tgl"> <!-- class noValideUE -->
                                        
                                        <td class="iconTgl"><i class="fa fa-plus"></i> <i class="fa fa-minus"></i></td>
                                        <td class="w-25">{{$ue->libelle}}</td>
                                        <td>{{$ue->coeff}}</td>
                                        <td>9.90</td> 
                                        <td> NACQ</td>
                                  
                                    </tr>
                                    
                                    @foreach($data['matiere'] as $matiere)

                                        @if($ue->id_ue==$matiere->id_ue)
                                            <tr class="tbl_tgl_{{$ue->id_ue}} default_hide">
                                                <td>
                                                    
                                                </td>
                                                <td class="tlt_mat">
                                                    {{$matiere->libelle}} 
                                                </td>
                                                <td>
                                                    {{$matiere->coeff}} 
                                                </td>
                                                <td>
                                                    10
                                                </td>
                                                 <td>
                                                    /
                                                </td>
                                                
                                            </tr>
                                            


                                        @endif
                                        

                                    @endforeach
                                    

                                @endforeach

                            @endif

            
            
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row p-1" style="border-top: solid silver 1px;">
                        <div class="d-flex justify-content-between w-100">
                            <legend style="font-size: 20px;color: #000; padding-top: 5px;">
                                Moyenne Générale : 10.97 ( / 20.00)
                            </legend>
                            <button class="btn btn-primary d-flex align-items-center">Télécharger un bulletin <i class="ml-2 fa fa-download"></i></button>
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
            $('.default_hide').hide();
            $('.fa-minus').hide();
            $('.fa-angle-up').hide();

            $('.clk_tgl').on('click', function(){

                var idHeadLine=$(this).attr('id');
                
                $(this).find(".fa-plus,.fa-minus").toggle();
                $('.tbl_tgl_'+idHeadLine).toggle();

            });

            $('#topdown').on('click',function(){

                 $('.default_hide').toggle();
                 $(".fa-plus,.fa-minus").toggle();
                 $(this).find(".fa-angle-down,.fa-angle-up").toggle();

            });

        });
    </script>
@endsection