<?php 
    include_once(BASE_PATH.'app/classes/Canais.dao.php');
    include_once(BASE_PATH.'app/classes/LineUp.dao.php');
    include_once(BASE_PATH.'app/classes/Frequencias.dao.php');
    include_once(BASE_PATH.'app/classes/Pacotes.dao.php');
    $arrCanais = array();
    if(isset($_GET['idpacote'])){
        if($_GET['idpacote']=='all'){
            $arrCanais = CanaisDAO::retornaTodos();
        }
        else{
            $arrCanais = CanaisDAO::retornaCanaisPorPacote($_GET['idpacote']);
        }
        
    }
    else{
        $arrCanais = CanaisDAO::retornaTodos();
    }
    
    if(isset($_GET['idcanal'])){
        $canalPorId = CanaisDAO::retornaCanalPorID($_GET['idcanal']);
    }
    
    
?>
<!--Página inicial de line up-->
<?php if(!isset($_GET['canal'])&&(!isset($_GET['search'])&&!isset($_GET['editar']))):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li class="active">Line Up</li>
                </ol>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <form action="<?php echo BASE_URL; ?>lineup/pesquisa/" method="POST" enctype="multipart/form-data" role="form" class="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="canal" class="form-control" placeholder="Buscar canal..." required="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <form class="form">
                            <div class="form-group">
                                <select name="ver-pacote" class="form-control">
                                    <option value="all">Visualizar todos os canais</option>
                                    <?php $arrPacotes = PacotesDAO::retornaTodos();?>
                                    <?php foreach($arrPacotes as $pacotes):?>
                                    <option value="<?php echo $pacotes->getIdpacote();?>"><?php echo $pacotes->getNome_pacote();?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <a href="<?php echo BASE_URL; ?>lineup/editar/" alt="Editar Line Up"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive" id="lineup-wrap">
                    <table class="table table-bordered table-striped table-condensed text-center" id="lineup">
                        <thead>
                            <tr>
                                <th class="">Logo</th>
                                <th class="">Display</th>
                                <th class="">Nome</th>
                                <th class="">Frequência</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrCanais as $canal):?>
                            <tr>
                                <td><img src="<?php echo BASE_URL; ?>/files/images/logo/<?php echo $logo = ($canal->getLogotipo()!='')?$canal->getLogotipo():'lg_cn_nao_disponivel.jpg';?>" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $canal->getDisplay();?>/"><?php echo $canal->getDisplay();?></a></td>
                                <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $canal->getDisplay();?>/"><?php echo $canal->getNome_canal();?></td>
                                <td><?php echo $canal->getFrequencia();?></td>
                            </tr>
                            <?php                endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div><!-- fim do row -->
    
</div><!-- fim do col-xm-12 -->
<?php endif;?>
<!--Página para visualizar informações de um canal-->
<?php if(isset($_GET['canal'])&&(!isset($_GET['search'])&&!isset($_GET['editar']))):?>
    <?php $canalPorDisplay = CanaisDAO::retornaCanalPorDisplay($_GET['canal']);?>
    <?php if($canalPorDisplay!=false):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                    <li class="active">Canal <?php echo $_GET['canal'];?></li>
                </ol>
                
                
                <div class="row">
                    <div class="col-xs-3">
                        <img src="<?php echo BASE_URL; ?>/files/images/logo/<?php echo $logo = ($canalPorDisplay->getLogotipo()!='')?$canalPorDisplay->getLogotipo():'lg_cn_nao_disponivel.jpg';?>" class="img-responsive img-thumbnail" alt="Responsive image">
                    </div>
                    <div class="col-xs-9">
                        <h2><?php echo $canalPorDisplay->getNome_canal();?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Frequência <span class="label label-info"><?php echo $canalPorDisplay->getFrequencia();?></span></h3>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php $canalFrequencia = FrequenciasDAO::retornaPorFrequencia($canalPorDisplay->getFrequencia());?>
                        <h3>Canal <span class="label label-info"><?php echo $canalFrequencia->getCanal();?></span></h3>
                    </div>
                </div>
                <?php $pacotesPorCanal = LineUpDAO::retornaPacotesPorCanal($canalPorDisplay->getIdcanal());?>
                    <table class="table table-responsive table-striped table-condensed">
                        <thead>
                            <tr>
                                <th class="">Pacotes aos quais o canal pertence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pacotesPorCanal as $pacote):?>
                            <tr>
                                <td><?php echo $pacote->getPacotes_idpacote();?></td>
                            </tr>
                            <?php            endforeach;?>
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>
    
</div>
    <?php endif;?>
    <?php if($canalPorDisplay==false):?>
            <div class="jumbotron">
                <h2>Ops! Canal não encontrado</h2>
            </div>
    <?php endif;?>
<?php endif;?>
<!--Página de resultado da pesquisa-->
<?php if(isset($_GET['search'])&&(isset($_POST['canal'])&&!isset($_GET['editar']))):?>
<?php $buscaCanal = CanaisDAO::buscaCanal($_POST['canal']);?>
    <?php if($buscaCanal!=false):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                    <li class="active">Resultado da pesquisa</li>
                </ol>
                <h3><span class="label label-success"><?php echo $_POST['canal'];?></span></h3>
                <h5>Canais encontrados com o termo pesquisado</h5>
                <h4>Selecione para ver detalhes sobre o mesmo</h4>
                <table class="table table-responsive table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="">Display</th>
                            <th class="">Nome</th>
                            <!--<th class="">Frequência</th>-->
                            <th class="">Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($buscaCanal as $busca):?>
                        <tr>
                            <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $busca->getDisplay();?>/"><?php echo $busca->getDisplay();?></a></td>
                            <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $busca->getDisplay();?>/"><?php echo $busca->getNome_canal();?></td>
                            <!--<td>453.000</td>-->
                            <td><img src="<?php echo BASE_URL; ?>/files/images/logo/<?php echo $logo = ($busca->getLogotipo()!='')?$busca->getLogotipo():'lg_cn_nao_disponivel.jpg';?>" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                        </tr>
                    <?php                            endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <?php endif;?>
    <?php if($buscaCanal==false):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                    <li class="active">Resultado da pesquisa</li>
                </ol>
                <h3><span class="label label-success"><?php echo $_POST['canal'];?></span></h3>
                <h4>Não foi encontrado nenhum canal com o termo pesquisado</h4>
                <h5>Por favor, realize uma <a href="<?php echo BASE_URL; ?>lineup/">nova busca</a> com outros termos, ou <a href="<?php echo BASE_URL; ?>reportar-problema/">reporte o problema</a> ao administrador</h5>
            </div>
        </div>
    </div>
</div>    
    <?php endif;?>
<?php endif;?>
<!--Página caso não seja informado nenhum termo de pesquisa-->
<?php if(isset($_GET['search'])&&(!isset($_POST['canal'])&&!isset($_GET['editar']))):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                    <li class="active">Resultado da pesquisa</li>
                </ol>
                <div class="row">
                    <h4>Nenhum termo pesquisado</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--Página para editar line up, canais e pacote-->
<?php if(isset($_GET['editar'])):?>
    <?php if(isset($_GET['editar'])&&!isset($_GET['oque'])):?>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                        <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                        <li class="active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Canais</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo BASE_URL; ?>lineup/editar/" method="POST" class="form-inline" id="adicionar-canal">
                            <input type="hidden" name="novocanal">
                            <div class="form-group">
                                <label for="display" class="sr-only">Display do canal</label>
                                <input type="text" class="form-control" name="display" placeholder="Display do canal">
                            </div>
                            <div class="form-group">
                                <label for="nomecanal" class="sr-only">Nome do canal</label>
                                <input type="text" class="form-control" name="nomecanal" placeholder="Nome do canal">
                            </div>
                            <select name="frequencia" class="form-control">
                                 <?php $arrFrequencias = FrequenciasDAO::retornaTodos();?>
                                    <option value="">Frequência</option>
                                    <?php foreach($arrFrequencias as $frequencia):?>
                                    <option value="<?php echo $frequencia->getIdfrequencia();?>"><?php echo ' Frequência: '.$frequencia->getQam_video();?></option>
                                    <?php endforeach?>
                            </select>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Pacotes</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo BASE_URL; ?>lineup/editar/" method="POST" class="form-inline" id="adicionar-pacote">
                        <div class="form-group">
                            <input type="hidden" value="novopacote">
                            <div class="form-group">
                                <label for="nomepacote" class="sr-only">Nome do pacote</label>
                                <input type="text" class="form-control" name="nomepacote" placeholder="Nome do pacote">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Relacionar canais a pacotes</h3>
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <form class="form-inline" action="<?php echo BASE_URL; ?>lineup/editar/lineup/" method="POST">
                            <div class="form-group">
                                <select name="relacionarpacote" class="form-control">
                                    <?php $arrPacotes = PacotesDAO::retornaTodos();?>
                                    <?php foreach($arrPacotes as $pacotes):?>
                                    <option value="<?php echo $pacotes->getIdpacote();?>"><?php echo $pacotes->getNome_pacote();?></option>
                                    <?php endforeach?>
                                </select>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
<!--http://localhost/tecnet/lineup/editar/canais/-->
    <?php if(isset($_GET['oque'])&&($_GET['oque'])=='canais'):?>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                        <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                        <li><a href="<?php echo BASE_URL; ?>lineup/editar/">Editar</a></li>
                        <li class="active">Canais</li>
                    </ol>
                    <h3>Editar Canais</h3>
                    <div class="table-responsive" id="lineup-wrap">
                        <table class="table table-bordered table-striped table-condensed text-center" id="lineup">
                            <thead>
                                <tr>
                                    <th class="">Logo</th>
                                    <th class="">Display</th>
                                    <th class="">Nome</th>
                                    <th class="">Frequência</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrCanais as $canal):?>
                                <tr>
                                    <td><img src="<?php echo BASE_URL; ?>/files/images/logo/<?php echo $logo = ($canal->getLogotipo()!='')?$canal->getLogotipo():'lg_cn_nao_disponivel.jpg';?>" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                    <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $canal->getDisplay();?>/"><?php echo $canal->getDisplay();?></a></td>
                                    <td><a href="<?php echo BASE_URL; ?>lineup/<?php echo $canal->getDisplay();?>/"><?php echo $canal->getNome_canal();?></td>
                                    <td><?php echo $canal->getFrequencia();?></td>
                                </tr>
                                <?php                endforeach;?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
<!--http://localhost/tecnet/lineup/editar/pacotes/-->
    <?php if(isset($_GET['oque'])&&($_GET['oque'])=='pacotes'):?>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                            <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                            <li><a href="<?php echo BASE_URL; ?>lineup/editar/">Editar</a></li>
                            <li class="active">Pacotes</li>
                        </ol>
                        <h3>Editar Pacotes</h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
<!--http://localhost/tecnet/lineup/editar/lineup/-->
    <?php if(isset($_GET['oque'])&&($_GET['oque'])=='lineup'):?>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <?php 
                
                $idPacote = $_POST['relacionarpacote'];
                $pac = PacotesDAO::retornaPacotePorID($idPacote);
            ?>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                            <li><a href="<?php echo BASE_URL; ?>lineup/">Line Up</a></li>
                            <li><a href="<?php echo BASE_URL; ?>lineup/editar/">Editar</a></li>
                            <li class="active">Line up</li>
                        </ol>
                        <h3>Editar Line Up do pacote <strong><?php echo $pac->getNome_pacote();?></strong></h3>
                        <form action="<?php echo BASE_URL; ?>app/ajax/teste.php" method="GET">
                            <input type="hidden" name="idpacote" value="<?php echo $idPacote;?>"/>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="">Logo</th>
                                        <th class="">Display</th>
                                        <th class="">Nome</th>
                                        <th class="">Selecionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php foreach($arrCanais as $canal):?>
                                    <tr>
                                        <td><img src="<?php echo BASE_URL; ?>files/images/logo/<?php echo $logo = ($canal->getLogotipo()!='')?$canal->getLogotipo():'lg_cn_nao_disponivel.jpg';?>" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                        <td><?php echo $canal->getDisplay();?></td>
                                        <td><?php echo $canal->getNome_canal();?></td>
                                        <td>
                                            <div class="form-group">
                                                <?php 
                                                    $checked = '';
                                                    $verificaCheck = LineUpDAO::verificaCanalPorPacote($idPacote, $canal->getIdcanal());
                                                    if($verificaCheck==true){
                                                        $checked = 'checked';
                                                    }
                                                ?>
                                                <input type="checkbox" name="canal[]" value="<?php echo $canal->getIdcanal();?>" data-off-label="Não" data-on-label="Sim" <?php echo $checked;?>>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                    
                                </tbody>
                            </table>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Salvar&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>

<?php 
if(isset($_POST['novocanal'])){
    $display = $_POST['display'];
    $nome = $_POST['nomecanal'];
    $frequencia = $_POST['frequencia'];
    CanaisDAO::insere($display, $nome, $frequencia);
}
if(isset($_POST['novopacote'])){
    $nomepacote = $_POST['nomepacote'];
    PacotesDAO::insere($nomePacote);
}


?>