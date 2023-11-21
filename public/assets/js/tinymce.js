// Styling Body Input
tinymce.init({
    selector: "textarea.full-featured-non-premium",
    plugins:
        "preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons",
    menubar: "file edit view insert format tools table help",
    toolbar:
        "undo redo | bold italic underline | forecolor backcolor removeformat fullscreen alignleft aligncenter alignright numlist bullist | fontfamily fontsize blocks ",
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    content_css: "//www.tiny.cloud/css/codepen.min.css",
    height: 520,
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image",
});
