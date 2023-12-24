<div x-data="{ value: @entangle($attributes->wire('model')).live }" x-init="tinymce.init({
    target: $refs.tinymce,
    themes: 'modern',
    height: 200,
    menubar: false,
    plugins: 'powerpaste advcode table lists checklist link anchor media image',
    toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table',
    branding: false,
    setup: function(editor) {
        editor.on('blur', function(e) {
            value = editor.getContent()
        })

        editor.on('init', function(e) {
            if (value != null) {
                editor.setContent(value)
            }
        })

        function putCursorToEnd() {
            editor.selection.select(editor.getBody(), true);
            editor.selection.collapse(false);
        }
    }
})" wire:ignore>
    <div>
        <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model.live') }}>
    </div>
</div>

<!-- $watch('value', function(newValue) {
    if (newValue !== editor.getContent()) {
        editor.resetContent(newValue || '');
        putCursorToEnd();
    }
}); -->