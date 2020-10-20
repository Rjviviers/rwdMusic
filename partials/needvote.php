<?php

?>
<div class="modal" tabindex="-1" role="dialog" id="songsneedvote">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">Songs You need to vote for</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $i = $myConn->needVoteUserList($_COOKIE["User"]);
                foreach ($i as $v) {
                    $id =  $v["SongID"];
                    $songname =   $v["SongName"] . " - " . $v["BandName"];
                ?>
                <a target="_blank" href="songdetails.php?ID=<?= $id ?>"><?= $songname ?></a>

                <?php

                    echo "<br>";
                }
                ?>
            </div>
            <div class="modal-footer">
                <?php if (!empty($_COOKIE['spotify'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="">Make Playlist</a>
                </li>
                <?php } else { ?>
                <li class="">
                    <a class=" " href="api.php">To make Playlist login with spotify</a>
                </li><?php } ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>