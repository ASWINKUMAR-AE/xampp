<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js"></script>
  <style>
    #editor {
      height: 500px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Online Code Editor</h1>
    <div id="editor">// Start typing your code here...</div>
    <button class="btn btn-primary mt-3" onclick="getCode()">Run Code</button>
  </div>

  <script>
    const editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");

    function getCode() {
      alert(editor.getValue());
    }
  </script>
</body>
</html>
