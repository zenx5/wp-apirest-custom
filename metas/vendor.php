<?php
$vendor = ApirestCustom::get_var_meta('apirest-custom-vendor') ?? '';
$version = ApirestCustom::get_var_meta('apirest-custom-version') ?? 'v1';

?>
<div style="display: flex;">
    <div>
        <input type="text" id="apirest-custom-vendor" name="apirest-custom-vendor" value="<?= $vendor ?>" />
    </div>
    <div>
        <input type="text" id="apirest-custom-version" name="apirest-custom-version" value="<?= $version ?>" />
    </div>
</div>