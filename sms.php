<!DOCTYPE html>
<html>
<head>
<style>
nav#nav1{ margin-top: 24px; }
nav#nav1 > a{ background:#B9E1FF; color:#000; padding:10px; text-decoration:none; border-radius:5px; font-family:"Arial Black", Gadget, sans-serif; }
nav#nav1 > a:hover{ background: #BBEA00; }
nav#nav1 > a:active{ background: #EEFFA8; }
</style>
<script>
var bleep = new Audio();
bleep.src = 'clicking.wav';
</script>
</head>
<body>
  <nav id="nav1">
    <a href="#" onmousedown="bleep.play()">Home</a>
    <a href="#" onmousedown="bleep.play()">About Us</a>
    <a href="#" onmousedown="bleep.play()">Services</a>
    <a href="#" onmousedown="bleep.play()">Contact</a>
  </nav>
</body>
</html>
