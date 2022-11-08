<?php
session_start();
include_once "../../../config.php";
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
echo '<link rel="stylesheet" href="../../fram/css/demo.css">';
?>
<div class="ce-example">
        <div class="ce-example__content _ce-example__content--small">
          <div id="editorjs"></div>
          <div class="ce-example__button" id="saveButton">Next</div>
        </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
      <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
      <script src="../../fram/js/editor.js"></script>
      <!--<script src="../../fram/js/json-preview.js"></script>-->
      <script>
        const saveButton = document.getElementById('saveButton');
        var editor = new EditorJS({
          holder: 'editorjs',
          tools: {
            header: {
              class: Header,
              inlineToolbar: ['link'],
              config: {
                placeholder: 'Header'
              },
              shortcut: 'CMD+SHIFT+H'
            },
            image: SimpleImage,
    
            list: {
              class: List,
              inlineToolbar: true,
              shortcut: 'CMD+SHIFT+L'
            },
    
            checklist: {
              class: Checklist,
              inlineToolbar: true,
            },
    
            quote: {
              class: Quote,
              inlineToolbar: true,
              config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
              },
              shortcut: 'CMD+SHIFT+O'
            },
    
            warning: Warning,
    
            marker: {
              class:  Marker,
              shortcut: 'CMD+SHIFT+M'
            },
    
            code: {
              class:  CodeTool,
              shortcut: 'CMD+SHIFT+C'
            },
    
            delimiter: Delimiter,
    
            inlineCode: {
              class: InlineCode,
              shortcut: 'CMD+SHIFT+C'
            },
    
            linkTool: LinkTool,
    
            embed: Embed,
    
            table: {
              class: Table,
              inlineToolbar: true,
              shortcut: 'CMD+ALT+T'
            },
    
          },
          data: {
            blocks: [
              {
                type: "header",
                data: {
                  text: "Product deletes",
                  level: 4
                }
              },
            ]
          },
          onReady: function(){
            saveButton.click();
          },
          onChange: function() {
            console.log('something changed');
          }
        });
        saveButton.addEventListener('click', function () {
          editor.save().then((savedData) => {
            cPreview.show(savedData, document.getElementById("output"));
          });
        });
      </script>