<!-- Block genboxes -->
<div id="genboxes_block_home" class="block" style="margin-top: 210px;">
    <h4>Ventes Flash de Box</h4>
    <div class="block_content">
        
        {if isset($boxes)}

            <div class="row">
                {foreach from=$boxes key=kbox item=box}
                    {assign var=libelle value="|"|explode:$kbox}
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{$libelle[0]}</h3>
                            </div>
                            <div class="panel-body">
                                <p>{$libelle[1]}</p>

                                {foreach from=$box item=product}
                                    <div style="border: 1px solid #ccc">
                                        <img src="http://{$smarty.server.HTTP_HOST}{$product.url}"/>

                                        <span>{$product.name}</span>
                                    </div>
                                    <input type="hidden" value="{$product.id_product}" class="idProduct">
                                    <br>
                                {/foreach}
                                 
                                <a href="javascript:void(0)" class="addCart" style="display:block; text-align: center;">
                                    <button type="button" class="btn btn-primary btn-lg">Ajouter au Panier</button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>

        {else}
            <div>Aucune box pour l'instant</div>
        {/if}
        
    </div>
</div>

<script type="text/javascript">
    
    $(function() {
        $('.addCart').click(function() {
            var idProduct = $(this).parent().parent().find('.idProduct');
            $(idProduct).each(function(i, v) {
                ajaxCart.add($(v).val(), null, false, this, 1);
            });
        })
    });

</script>
<!-- /Block genboxes -->
