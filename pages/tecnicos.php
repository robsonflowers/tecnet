<?php 
    include_once(BASE_PATH.'app/classes/Tecnicos.dao.php');
    
    $arrTecnicos = TecnicoDAO::retornaTodos()
    
    
    
?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li class="active">Técnicos</li>
                </ol>
                <div class="table-responsive col-md-8 col-md-offset-2">
                    <table class="table table-striped table-bordered table-condensed" id="tabela-tecnicos">
                        <thead>
                            <tr>
                                <th class="">Login</th>
                                <th class="">Nome</th>
                                <th class="">Telefone</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach($arrTecnicos as $tecnico):?>
                            <tr class="seleciona-tecnico">
                                <td class=""><?php echo $tecnico->getLogin();?></td>
                                <td class=""><?php echo $tecnico->getNome_tecnico();?></td>
                                <td class=""><a href="tel://55-54-9168-3727" id="cal-phone"><?php echo $tecnico->getCelular();?></a></td>
                            </tr>

                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
