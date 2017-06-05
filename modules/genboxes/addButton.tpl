<div class="pull-right" style="margin-bottom: 10px;">

    {if $idBox}
        <a href="{$link->getAdminLink('AdminModules')}&configure=genboxes">
            <button class="btn btn-lg btn-default">
                <span class="icon-arrow-left"></span> Liste Box
            </button>
        </a>
    {/if}
    
    <a href="{$link->getAdminLink('AdminModules')}&configure=genboxes&{$about}&id_box={$idBox}">
        <button class="btn btn-lg btn-default">
            <span class="icon-plus"></span> Ajouté
        </button>
    </a>
    
</div>