<span class="field-options">
    {if $Column.DisplaySetToNullCheckBox}
        <button tabindex="-1" class="set-to-null btn btn-default btn-xs {if $Column.IsValueNull}active{/if}" data-toggle="button" onclick="return false;">{$Captions->GetMessageString('SetToNull')}</button>
        <input class="set-to-null-input" type="hidden" id="{$Column.SetNullCheckBoxName}" name="{$Column.SetNullCheckBoxName}" value="{if $Column.IsValueNull}1{else}0{/if}">
    {/if}
    {if $Column.DisplaySetToDefaultCheckBox}
        <button tabindex="-1" class="set-default btn btn-default btn-xs" data-toggle="button" onclick="return false;">set default</button>
        <input class="set-default-input" type="hidden" id="{$Column.SetDefaultCheckBoxName}" name="{$Column.SetDefaultCheckBoxName}" value="{$Column.IsValueSetToDefault}">
    {/if}
</span>