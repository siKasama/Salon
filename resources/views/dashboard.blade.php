 @extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Cabeleila Leila', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Agendamento') }}</h4>
                            <p class="card-category">{{ __('') }}</p>
                        </div>
                        <div class="card-body">
                            <h3> {{ date('M') }} </h3>
                            <p style="align:center; color: purple;">Hoje: {{ date('d/m/Y') }}</p>
                            <table class="table table-hover table-striped" style="left: 5%; border: 1px; cellspacing:0;">
                                <tr>
                                    <?php
                                        $semanas = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');
                                        for( $i = 0; $i < 7; $i++ )
                                        echo "<td>".$semanas[$i]."</td>";
                                    ?>
                                </tr>                                   
                                <?php $diacorrente = 0;
                                for( $linha = 0; $linha < 6; $linha++ ) { ?>
                    	        <tr>
                                    <?php
                                    $mes = date('m');
                                    
                                    $numero_dias = array( 
                                        '01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
                                        '07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
                                    );

                                    if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0) {
                                        $numero_dias['02'] = 29;
                                    }

                                    $diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
                            	    for( $coluna = 0; $coluna < 7; $coluna++ ) {
		                                echo "<td style='text-align:right;' width = 30 height = 30 ";
		                                if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) ) {	
			                                echo " id = 'dia_atual' ";
		                                }
		                                else {
			                                if (($diacorrente + 1) <= $numero_dias[$mes]) {
			                                    if ( $coluna < $diasemana && $linha == 0) {
					                                echo " id = 'dia_branco' ";
                                                }
				                                else  {
				  	                                echo " id = 'dia_comum' ";
				                                }
			                                }
			                                else {
				                                echo " ";
			                                }
		                                }
		                                echo " align = 'center' valign = 'center'>";
                            
                                        if ( $diacorrente + 1 <= $numero_dias[$mes] ) {
                                           if ( $coluna < $diasemana && $linha == 0) {
                                            echo " ";
                                            }
                                            else {
                                                $dateClick = date('Y')."-".$mes."-".($diacorrente+1);
                                                // $_SERVER["PHP_SELF"]."?mes=$mes&dia=".($diacorrente+1)
                                                echo "<a href = " .route('diaries.byDate', $dateClick). ">". ++$diacorrente . "</a>";
                                            }
                                        }
                                        else {
                                            break;
                                        }
                            		    echo "</td>";
	                                }
                                    ?>
	                            </tr>
	                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            demo.showNotification();

        });
    </script>
@endpush
