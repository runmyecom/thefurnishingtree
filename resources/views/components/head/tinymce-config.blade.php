<script src="https://cdn.tiny.cloud/1/57naayre26zx3tkv995ze4azse6wr7wsrpl5mbyso422sp1v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', 
     forced_root_block: false,
     plugins: 'powerpaste advcode table lists checklist autosave',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table',
     branding: false,
     setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent('<p>Write product description</p>');
      });
      editor.on('change', function (e) {
        var content = tinymce.activeEditor.getContent();
        document.getElementById('description').value = content;
      })
    }
   });
</script>