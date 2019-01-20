<fieldset id="fieldset-max-download"><legend><?php echo __('Maximum downloads'); ?></legend>
    <div class="field">
        <div class="two columns alpha">
            <?php echo $this->formLabel('download_protect_max_free_download',
                __('Maximum size without captcha')); ?>
        </div>
        <div class='inputs five columns omega'>
            <?php echo $this->formText('download_protect_max_free_download', get_option('download_protect_max_free_download'), null); ?>
            <p class="explanation">
                <?php echo __('Above this size, a captcha will be added to avoid too many downloads from a user.'); ?>
                <?php echo ' ' . __('Set a very high size to allow all files to be downloaded.'); ?>
                <?php echo ' ' . __('Note that the ".htaccess" and eventually "routes.ini" files should be updated too.'); ?>
            </p>
        </div>
    </div>
    <div class='field'>
        <div class="two columns alpha">
            <?php echo $this->formLabel('download_protect_legal_text',
                __('Legal agreement')); ?>
        </div>
        <div class='inputs five columns omega'>
            <div class='input-block'>
                <?php echo $this->formTextarea(
                    'download_protect_legal_text',
                    get_option('download_protect_legal_text'),
                    array(
                        'rows' => 5,
                        'cols' => 60,
                        'class' => array('textinput', 'html-editor'),
                     )
                ); ?>
                <p class="explanation">
                    <?php echo __('This text will be shown beside the legal checkbox to download a file.'); ?>
                    <?php echo ' ' . __('Let empty if you don’t want to use a legal agreement.'); ?>
                </p>
            </div>
        </div>
    </div>
</fieldset>
<?php
$isOmekaBefore26 = version_compare(OMEKA_VERSION, '2.6', '<');
echo $isOmekaBefore26 ? js_tag('vendor/tiny_mce/tiny_mce') : js_tag('vendor/tinymce/tinymce.min');
?>
<script type="text/javascript">
<?php if ($isOmekaBefore26): ?>
jQuery(window).load(function () {
    Omeka.wysiwyg({
        mode: 'specific_textareas',
        editor_selector: 'html-editor'
    });
});
<?php else: ?>
jQuery(document).ready(function () {
    Omeka.wysiwyg({
        selector: '.html-editor'
    });
});
<?php endif; ?>
</script>
