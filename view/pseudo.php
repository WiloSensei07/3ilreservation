<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Input</title>
</head>
<body>
<label for="pseudo">pseudo: </label>
<input type="text" id="pseudo"><br>
<input type="submit" value="suivant" id="sub">

<script>
    let sub= document.getElementById('sub');
    sub.onclick=function(e){
        document.location.href='codeView.php?pseudo='+document.getElementById('pseudo').value;
    }
</script>
</body>
</html>