{if $charts}
    <div class="row pgui-charts pgui-charts-{$Page->GetPageName()}">
        {foreach from=$charts item=chart key=index}
            <div class="{$chartsClasses[$index]}">
                {$chart}
            </div>
        {/foreach}
    </div>
{/if}