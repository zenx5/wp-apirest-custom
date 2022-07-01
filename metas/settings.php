<?php
$url = ApirestCustom::get_var_meta('apirest-custom-url') ?? '';
$current_method = ApirestCustom::get_var_meta('apirest-custom-method') ?? 'get';

?>
<div style="display: flex;">
    <div>
        <select id="apirest-custom-method" name="apirest-custom-method">
            <?php foreach (['get', 'post', 'delete', 'put'] as $method) : ?>
                <option value="<?= $method ?>" <?= $current_method == $method ? "selected" : "" ?>><?= $method ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="text" id="apirest-custom-url" name="apirest-custom-url" value="<?= $url ?>" />
    </div>
</div>