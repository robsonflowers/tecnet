

<aside role="complementary" class="col-sm-3 col-md-2 col-xs-8 sidebar" id="">
        
    <ul class="nav nav-sidebar text-left">
        <li <?php if($page == 'index'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>"><span class="glyphicon glyphicon-home">&nbsp;&nbsp;</span>Início<span class="sr-only">(current)</span></a></li>
        <li <?php if($page == 'solicitacoes'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>solicitacoes/"><span class="glyphicon glyphicon-shopping-cart">&nbsp;&nbsp;</span>Solicitações</a></li>
        <li <?php if($page == 'lineup'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>lineup/"><span class="glyphicon glyphicon-list-alt">&nbsp;&nbsp;</span>Line Up de Canais</a></li>
        <li <?php if($page == 'frequencias'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>frequencias/"><span class="glyphicon glyphicon-signal">&nbsp;&nbsp;</span>Frequências</a></li>
        <li <?php if($page == 'tecnicos'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>tecnicos/"><span class="glyphicon glyphicon-user">&nbsp;&nbsp;</span>Técnicos</a></li>
        <li <?php if($page == 'conta'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>conta/"><span class="glyphicon glyphicon-cog">&nbsp;&nbsp;</span>Conta</a></li>
    </ul>
</aside>
