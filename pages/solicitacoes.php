<?php if(isset($_GET['tiposolicitacao'])):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li class="active">Técnicos</li>
                </ol>
                <?php // if($_GET['tiposolicitacao']=='miscelanea'):?>
                <div class="table-responsive">
                    <table class="table table-condensed" >
                        <tbody>
                            <?php // foreach($arrTecnicos as $tecnico):?>
                            <tr class="seleciona-tecnico">
                                <td class=""><img src="<?php echo BASE_URL; ?>/files/images/logo/lg_cn_nao_disponivel.jpg" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td class=""><h4><strong>Decoder DVR</strong></h4></td>
                                <td class="">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-plus"></span></button>
                                    <input type="text" value="10" style="width: 40px;text-align: center;font-size: 18px; font-weight: bold;color: #2c3e48">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-minus"></span></button>
                                </td>
                            </tr>
                            <tr class="seleciona-tecnico">
                                <td class=""><img src="<?php echo BASE_URL; ?>/files/images/logo/lg_cn_nao_disponivel.jpg" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td class=""><h4><strong>Decoder HD</strong></h4></td>
                                <td class="">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-plus"></span></button>
                                    <input type="text" value="10" style="width: 40px;text-align: center;font-size: 18px; font-weight: bold;color: #2c3e48">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-minus"></span></button>
                                </td>
                            </tr>
                            <tr class="seleciona-tecnico">
                                <td class=""><img src="<?php echo BASE_URL; ?>/files/images/logo/lg_cn_nao_disponivel.jpg" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td class=""><h4><strong>Decoder SD</strong></h4></td>
                                <td class="">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-plus"></span></button>
                                    <input type="text" value="10" style="width: 40px;text-align: center;font-size: 18px; font-weight: bold;color: #2c3e48">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-minus"></span></button>
                                </td>
                            </tr>
                           <tr class="seleciona-tecnico">
                                <td class=""><img src="<?php echo BASE_URL; ?>/files/images/logo/lg_cn_nao_disponivel.jpg" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td class=""><h4><strong>EMTA 2.0</strong></h4></td>
                                <td class="">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-plus"></span></button>
                                    <input type="text" value="10" style="width: 40px;text-align: center;font-size: 18px; font-weight: bold;color: #2c3e48">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-minus"></span></button>
                                </td>
                            </tr>
                            <tr class="seleciona-tecnico">
                                <td class=""><img src="<?php echo BASE_URL; ?>/files/images/logo/lg_cn_nao_disponivel.jpg" class="img-responsive img-thumbnail" alt="Responsive image"></td>
                                <td class=""><h4><strong>EMTA 3.0</strong></h4></td>
                                <td class="">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-plus"></span></button>
                                    <input type="text" value="10" style="width: 40px;text-align: center;font-size: 18px; font-weight: bold;color: #2c3e48">
                                    <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-large glyphicon-minus"></span></button>
                                </td>
                            </tr>
                            <?php // endforeach;?>
                        </tbody>
                    </table>
                    
                </div>
                <?php // endif;?>
                <div class="col-md-6"><h2>Total</h2></div>
                <div class="col-md-6"><h2><span class="label label-info">25</span></h2></div>
            </div>
        </div>
    </div>
</div>

<?php endif;?>
<?php if(!isset($_GET['tiposolicitacao'])):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class="breadcrumb">
                    <li><a href="<?php echo BASE_URL; ?>">Início</a></li>
                    <li class="active">Solicitações</li>
                </ol>
                <div class="row main-options">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-list-alt glyphicon-large" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-10">
                        <a href="<?php echo BASE_URL; ?>solicitacoes/acessorios/">
                            <h3>Acessórios</h3>
                        </a>
                    </div>
                </div>
                <div class="row main-options">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-list-alt glyphicon-large" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-10">
                        <a href="<?php echo BASE_URL; ?>solicitacoes/miscelanea/">
                            <h3>Miscelânea</h3>
                        </a>
                    </div>
                </div>
                <div class="row main-options">
                    <div class="col-xs-2">
                        <span class="glyphicon glyphicon-list-alt glyphicon-large" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-10">
                        <a href="<?php echo BASE_URL; ?>solicitacoes/equipamentos/">
                            <h3>Equipamentos</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
