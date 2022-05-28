<!DOCTYPE html>
<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
             $('#show').click(function() {
               $('.menu').toggle("slide");
             });
         });
      </script>
   </head>
   <body>
      <div id="show">Cliquez ici pour afficher ou masquer l'élément(DIV)</div>
      <div class="menu" style="display: none;">
         <ol>
            <li>JavaScript</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>JQuery</li>
         </ol>
      </div>
   </body>
</html>