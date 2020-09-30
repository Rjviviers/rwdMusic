<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css\font-awesome\all.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script>
function addsong() {
    var noofsongs = document.getElementById('nu').value;
    var url = "https://www.rwdmusic.co.za/addsong.php?NoOfSongs=".concat(noofsongs);
    window.location.href = url;
}
</script>
</head>
<style>
.fab-ctr {
    z-index: 999;
    width: 100%;
    position: fixed;
    right: 0;
    bottom: 0;
    -webkit-transform-origin: center center;
    -moz-transform-origin: center center;
    -ms-transform-origin: center center;
    -o-transform-origin: center center;
    transform-origin: center center;
    -webkit-transform: rotate(0) translateX(0) translateY(0);
    -moz-transform: rotate(0) translateX(0) translateY(0);
    -ms-transform: rotate(0) translateX(0) translateY(0);
    -o-transform: rotate(0) translateX(0) translateY(0);
    transform: rotate(0) translateX(0) translateY(0);
    padding: 10px;
    will-change: transform;
    transition: 0.25s all ease-in-out;
}

.fab {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #4285F4;
    float: right;
    will-change: transform;
    transition: 0.25s all ease-in-out;
    cursor: pointer;
    font-size: 20px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.35);
    text-align: center;
    vertical-align: bottom;
    line-height: 60px;
}

.fab:hover {
    background: #5a95f5;
    width: 65px;
    height: 65px;
}
</style>

<body class="bg-dark text-white">
    <nav class="navbar nav-fill navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand capt" href="userprofile.php"><?php echo "Welcome, " . $_COOKIE['Uname']?></a>
        <div class=" navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <!-- <button class="nav-link btn" onclick="toggle()" href="">Add Song</button> -->
                    <button type="button" class="nav-link btn" data-toggle="modal" data-target="#sngForm">Add
                        Song</button>
                </li>
                <?php if (!empty($_COOKIE['spotify'])) { ?>
                <li class="nav-item">
                    <a class="nav-link " href="#">Spotify logged in</a>
                </li>
                <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link " href="api.php">Get Spotify Access</a>
                </li><?php }?>
                <li class="nav-item">
                    <a class="nav-link " href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <div class="flotingab" id="masterfab"><button type="button" class="nav-link btn" data-toggle="modal"
            data-target="#sngForm"><i class="fas fa-music"></i></button></div>
            <div class="nav"> -->
    <div class="fab-ctr">
        <div class="fab fas fa-music" data-toggle="modal" data-target="#sngForm"></div>
    </div>
    </div>
    <div class="modal fade " id="sngForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Song add method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nu">Number of songs to add</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input id="nu" class="form-control col-xl" type="number" name="quantity" min="1"
                                    max="15" value="1">
                            </div>
                            <div class="col-md-4">
                                <button class="pt-1 pl-2 btn btn-warning col" onclick="addsong()">GO</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="nu">Number of songs to add</label>
                        <div class="row m-3">
                            <input id="nu" class="form-control col-xl" type="number" name="quantity" min="1" max="15"
                                value="1">
                            <button class="pt-1 pl-2 btn btn-warning col" onclick="addsong()">GO</button>
                        </div>
                    </div> -->

                    <div class="col pt-2 pl-3 row-cols-1">

                        <?php if (!empty($_COOKIE['spotify'])) { ?>
                        <label class="col">Spotify Beta</label>
                        <a class="btn col btn-warning" href="addsong.php?s=yes">
                            song add
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>