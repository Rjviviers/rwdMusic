<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css\font-awesome\all.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<script src="js/bootstrap.min.js"></script>
<script>
function addsong() {
    var noofsongs = document.getElementById('nu').value;
    var url = "https://www.rwdmusic.co.za/addsong.php?NoOfSongs=".concat(noofsongs);
    window.location.href = url;
}
</script>
</head>

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