
<?php 
    include_once(BASE_PATH.'app/classes/Frequencias.dao.php');
    if(isset($_POST['novafrequencia'])){
        $canal = $_POST['canal'];
        $qam_video = $_POST['frequencia'];
        $digital_analogico = strtoupper($_POST['digitalanalogico']);
        FrequenciasDAO::insere($canal, $qam_video, $digital_analogico);
    }
    $arrFrequencias = FrequenciasDAO::retornaTodos();
    
    
?>
<?php if(isset($_GET['editar'])):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li><a href="<?php echo BASE_URL; ?>frequencias/">Frequências</a></li>
                    <li class="active">Editar</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Frequências</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo BASE_URL; ?>frequencias/editar/" method="POST" class="form-inline" id="adicionar-frequencia">
                    <div class="form-group">
                        <input type="hidden" name="novafrequencia">
                        <div class="form-group">
                            <label for="canal" class="sr-only">Canal</label>
                            <input type="text" class="form-control" name="canal" placeholder="Canal">
                        </div>
                        <div class="form-group">
                            <label for="frequencia" class="sr-only">Frequência</label>
                            <input type="text" class="form-control" name="frequencia" placeholder="Frequência">
                        </div>
                        <div class="form-group">
                            <label for="digitalanalogico" class="sr-only">Digital/Analógico</label>
                            <input type="text" class="form-control" name="digitalanalogico" placeholder="Digital/Analógico">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th class="">Canal</th>
                                <th class="">Frequência</th>
                                <th class="">Digital/Analógico</th>
                                <th class="">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrFrequencias as $frequencia):?>
                            <tr>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getCanal();?></span></h3></td>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getQam_video();?></span></h3></td>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getDigital_analogico();?></span></h3></td>
                                <td>
                                    <h3>
                                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Excluir</button>
                                        <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>&nbsp;Editar</button>
                                    </h3>
                                </td>
                            </tr>
                            <?php                        endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
<?php endif;?>
<?php if(!isset($_GET['editar'])):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li class="active">Frequências</li>
                </ol>
                <form action="<?php echo BASE_URL; ?>frequencias/pesquisa/" method="POST" enctype="multipart/form-data" role="form" class="form">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="canal" class="form-control" placeholder="Buscar frequência ou canal..." required="">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </span>
                        </div>
                    </div>
                </form>  
                <a href="<?php echo BASE_URL; ?>frequencias/editar/" alt="Editar Frequências"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th class="">Canal</th>
                                <th class="">Frequência</th>
                                <th class="">Digital/Analógico</th>
                                <th class="">Displays</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrFrequencias as $frequencia):?>
                            <tr>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getCanal();?></span></h3></td>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getQam_video();?></span></h3></td>
                                <td><h3><span class="label label-info"><?php echo $frequencia->getDigital_analogico();?></span></h3></td>
                                <td><h3><span class="glyphicon glyphicon-chevron-right"></span></h3></td>
                            </tr>
                            <?php                        endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>