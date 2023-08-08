<!DOCTYPE html>
<html>
<head>
  <title>404Error_Page_not_found</title>
<style>
  body{
    margin:0;
    padding:0;
    font-family:fantasy;
    min-height: 100vh;
    background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
    }

  #container{
    width:100%;
    position:absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    }

  #container h1{
    font-size: 160px;
    margin: 0;
    font-weight: 900;
    letter-spacing: 20px;
    color: cornsilk ;
    }
    
 
  .button {
  font-weight: 300;
  color: #efefef;
  font-size: 1.2em;
  text-decoration: none;
  border: 1px solid #efefef;
  padding: .5em;
  border-radius: 3px;
  float: left;
  margin: 6em 0 0 -150px;
  left: 50%;
  position: relative;
  transition: all .3s linear;
    }

  .button:hover {
    background-color: #007aff;
    color: #fff;
  }
</style>

</head>
<body>
<div id="container">
    <h2>Oops! Page not found</h2>
    <h1>404</h1>
    <p>We can't find page you are looking for.</p>
    <p>Try looking for something else.</p>
    <a class="button" href="index.php"><i class="icon-home"></i> Go back in initial page, is better.</a>
</div>      
</body>
</html>
