<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';

$userIDnew = $_COOKIE["User"];

if (isset($_GET['id'])) {
    
}
?>


<section class="cards">
<style>
    /* @import url('https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700');
    @import url('https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

    *{
      box-sizing: border-box;
    }

    body, html {
       font-family: 'Roboto Slab', serif;
        margin: 0;
      width: 100%;
    height: 100%;
        padding: 0;
    }

    body {
      background-color: #494949;

    } */

    .cards {


    display: grid;
    grid-gap: 25px;
    padding-left: 25px;
    width:100%;
    grid-template-columns: 1fr 1fr 1fr;
    }
    /* On screens that are 992px or less, set the background color to blue */
    @media screen and (max-width: 992px) {
    .cards {
    grid-template-columns: 1fr 1fr ;
    }
    }

    /* On screens that are 600px or less, set the background color to olive */
    @media screen and (max-width: 600px) {
    .cards {
    grid-template-columns: 1fr;
    }
    }
    /* .card--1 .card__img, .card--1 .card__img--hover {
    background-image: url('https://via.placeholder.com/150');
    }

    .card--2 .card__img, .card--2 .card__img--hover {
    background-image: url('https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');
    } */

    .card__like {
    width: 18px;
    }

    .card__clock {
    width: 15px;
    vertical-align: middle;
    fill: #AD7D52;
    }
    .card__time {
    font-size: 12px;
    color: #AD7D52;
    vertical-align: middle;
    margin-left: 5px;
    }

    .card__clock-info {
    float: right;
    }

    .card__img {
    visibility: hidden;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 235px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;

    }

    .card__info-hover {
    position: absolute;
    padding: 16px;
    width: 100%;
    opacity: 0;
    top: 0;
    }

    .card__img--hover {
    transition: 0.2s all ease-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    position: absolute;
    height: 235px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    top: 0;

    }
    .card {
    margin-right: 25px;
    transition: all .4s cubic-bezier(0.175, 0.885, 0, 1);
    background-color: rgb(255, 255, 255);
    /* width: 33.3%; */
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 13px 10px -7px rgba(0, 0, 0,0.1);
    }
    .card:hover {
    box-shadow: 0px 30px 18px -8px rgba(0, 0, 0,0.1);
    transform: scale(1.10, 1.10);
    }

    .card__info {
    z-index: 2;
    background-color: rgb(255, 255, 255);
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    padding: 16px 24px 24px 24px;
    }

    .card__category {
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 2px;
    font-weight: 500;
    color: #868686;
    }

    .card__title {
    margin-top: 5px;
    margin-bottom: 10px;
    font-family: 'Roboto Slab', serif;
    }

    .card__by {
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
    }

    .card__author {
    font-weight: 600;
    text-decoration: none;
    color: #AD7D52;
    }

    .card:hover .card__img--hover {
    height: 100%;
    opacity: 0.3;
    }

    .card:hover .card__info {
    background-color: transparent;
    position: relative;
    }

    .card:hover .card__info-hover {
    opacity: 1;
    }

</style>
<?php


$arr = [
 array("songid" => 1, "url" => "https://via.placeholder.com/100", "songname" => "test1", "posted" => "date1", "user" => "user1"),
 array("songid" => 2, "url" => "https://via.placeholder.com/200", "songname" => "test2", "posted" => "date2", "user" => "user2"),
 array("songid" => 3, "url" => "https://via.placeholder.com/300", "songname" => "test4", "posted" => "date3", "user" => "user3"),

];
foreach ($arr as $value) {

 ?>
    <style>
      .card--<?=$value["songid"]?> .card__img, .card--<?=$value["songid"]?> .card__img--hover {
          background-image: url('<?=$value["url"]?>');
      }
    </style>
      <article class="card card--<?=$value["songid"]?>" >
        <div class="card__info-hover">
          <svg class="card__like"  viewBox="0 0 24 24">
          <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
      </svg>


        </div>
        <div class="card__img" ></div>
        <a href="#" class="card_link">
            <div class="card__img--hover"></div>
          </a>
        <div class="card__info">
          <span class="card__category"> <?=$value["posted"]?></span>
          <h3 class="card__title"><?=$value["songname"]?></h3>
          <span class="card__by">by <a href="#" class="card__author" title="author"><?=$value["user"]?></a></span>
        </div>
      </article>
      <?php }?>