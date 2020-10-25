{$tinyMCEscript}
{if isset($consoles) && is_array($consoles)}
{foreach from=$consoles item=$item}
<script language="javascript">
tinymce.init({
    selector: "textarea{$item}",
    height: 500,
    resize: false,
    theme: 'modern',
    menubar: false,
    plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | forecolor backcolor",
    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    image_advtab: true,
    branding: false
});
</script>
{/foreach}
{/if}