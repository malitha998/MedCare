<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Screen Sharing Example</title>
  </head>
  <body>
    <video id="screen" width="640" height="480" autoplay></video>
    <button onclick="startScreenShare()">Start Screen Share</button>
    <script>
      var screenStream;

      function startScreenShare() {
        navigator.mediaDevices.getDisplayMedia({ video: true })
          .then(function(stream) {
            screenStream = stream;
            var video = document.getElementById("screen");
            video.srcObject = screenStream;
            video.play();
          })
          .catch(function(error) {
            console.log("Error sharing screen: " + error);
          });
      }
    </script>
  </body>
</html>
