<?php

session_start();
    $_SESSION['token'] = md5(rand());
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://janpe.ovh/css/domainstyle.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!--download jquery later-->
    <script src="https://janpe.ovh/js/domain.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-primary"id="nav">dd</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div id="name">
                <h2>check domain availability</h2>
            </div>
            <div id="inputform"class="input-group input-group-lg mb-3">
                <input type="text"id="domainname" class="form-control"placeholder="Enter domain name">
                <input type="hidden"id="csrf"<?php
                    echo "value='".$_SESSION['token']."'";
                ?>
                >
                <div class="input-group-append">
                    <button id="submit"class="btn btn-lg btn-outline-primary">submit</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-3">jjk</div>
    <div class="col" id="data">kkj
    </div>
    <div class="col-3">
        <div id="drop">
            <a>Show Server Location</a>
            <i id="triangle"class="arrow down"></i>
            <iframe
                    id="map"
                    width="100%"
                    height="130%"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    >
            </iframe>
        </div>
    </div>
</div>
</div>
</body>
</html>
