<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?=$config->assets_url.'sandbox.js'?>"></script>
<script src="<?=$config->assets_url.'custom.js'?>"></script>
<script>

let data=window.performance.getEntriesByType("navigation")[0].type;
console.log(data);
</script>
</body>
</html>