<?php
include("config.php"); //DB연결을 위한 config.php를 로딩합니다.
session_start(); //세션의 시작
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $myusername=addslashes($_POST['username']);
  $mypassword=addslashes($_POST['password']);
  $sql="SELECT * FROM login WHERE username='$myusername' and password='$mypassword'";
echo $sql;
  $result=mysql_query($sql);
echo $result;
  //$row=mysql_fetch_array($result);
  //$active=$row['active'];
  $count=mysql_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count==1) //count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다.
  {
    session_start();
    $_SESSION['login_user']=$myusername;
    header("Location: http://daeguuniv.dothome.co.kr/welcome.php");
    //header("location: http://daeguuniv.dothome.co.kr/welcome.php"); // welcome.php 페이지로 넘깁니다.
    exit();
  }
  else
  {
    $error="Your Login Name or Password is invalid";

  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Project Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        /*문서 전체*/
        margin:0;
        padding:0;
        font-family:"바탕";
        font-size:1em;
      }
      a:link {
        text-decoration:none;  /* 텍스트 밑줄 제거*/
      }
      a img {
        border:0;   /* 이미지 테두리 제거j*/
      }
      body {
        background:#FFFFFF no-repeat left top fixed;   /* 문서 배경 */
        background-size:cover ;  /* 배경 이미지 css 관련 */
      }

      #wrapper {
        margin: 0 auto;   /* 화면 중앙 */
        width: 90%;  /* 브라우저 90% */
        background:white;   /* 배경색 */
        border: 1px solid #ccc;  /* 테두리 */
      }

      /* small size css */
      nav {
        width: 100%;
        height:50px;
        background-color: #C51A3A;
        margin: 0;
        padding-top:1px;
      }
      nav ul {
        list-style:none;
        text-align:center;
      }
      nav ul li{
       float:left;
      }
      nav ul li a, nav ul li a:visited {
        padding:15px 10px;
        font-weight: 600;
        color: white;
        text-shadow:0 0.5px 0.5px red;  /* 그림자 효과 */
      }
      nav li a:hover {
        color:red;
        background-color:white;
        text-shadow:0 0.5px 1px white;
        border-radius:10px 10px 0 0;
      }
      #sql {
		    text-align:center;
		    width: 100%;
      }
      #sql img {
        width: 100%;
      }
      hr {
        clear:both;
        visibility:hidden;
      }
      #loginForm {
        margin-left: 50%;
        position: relative;
        width: 47%;
      }
      #loginForm .box .iText {
        width: 70%;
        margin: 0.2% 0;
        padding: 2.5% 3%;
        border: 1px solid #e1e1e1;
      }
      #loginForm .box p {
        margin-top: 1em;
      }
      #loginForm .box p input {
        height: 18px;
        font-size: 11px;
        color: #737373;
        line-height: 18%;
        vertical-align: middle;
      }
      #loginForm .loginBtn {
        margin-top: 14%;
        display: block;
        position: absolute;
        top: 0%;
        right: 0%;
        width: 18%;
        height: 41%;
        padding: 2.3%;
        border-radius: 5%;
        color: #fff;
        line-height: 60px;
        text-align: center;
        text-shadow: 1px 1px 1px #004773;
        background: #333;
      }
      #customer {
        width:90%;
        margin-left:2%;
        margin-bottom:15px;
      }
      #customer h3{
    	  padding: 10px;
	      background-color: #E66C6D;
	      color: #fff;
      }
      #customer ul{
	      list-style:square;
      }
      #customer ul li{
	      font-size:0.9em;
	      line-height:25px;
      }
      .sub{
        width:90%;
        height:200px;
        border:1px dotted #2a2399;
        border-radius:10px;
        margin-left:2%;
        margin-bottom:15px;
      }
      #choice1 {
	      background:url(/bg1.png) no-repeat left bottom;
	      background-size:contain;
      }
      #choice2 {
	      background:url(/bg2.png) no-repeat left bottom;
	      background-size:contain;
      }
      #choice3 {
	      background:url(/bg3.png) no-repeat left bottom;
	      background-size:contain;
      }
      .sub  .heading {
	      width:95%;
	      background-color:rgba(255,255,255,.6);
	      margin-top:120px;
	      text-align:right;
      }
      .sub .heading h3{
	      color: #936;
	      font-weight: 600;
	      font-family: "바탕";
	      font-size: 1.5em;
      }
      .sub .heading h4{
	      color: #06F;
	      font-weight: 600;
	      font-family: "바탕";
	      font-size: 1em;
      }
      footer {
	      width: 100%;
	      height: 50px;
        border-top: 1px solid #ccc;
      }
      footer ul {
	      list-style:none;
	      margin:0;
      }
      footer ul li a{
	      float:left;
	      font-size:0.8em;
	      padding:15px 5px;
	      color:#222;
      }
      footer p{
	      float:right;
	      text-align:left;
	      font-size:0.8em;
	      padding-right:5px;
      }
      /* middle size css*/
        @media all and (min-width:768px) and (max-width:1024px) {

            #customer {
                width: 45%;
                margin-left: 2%;
                float: left;
            }

            #choice1 {
                width: 45%;
                margin-left: 2%;
                float: left;
            }

            #choice2 {
                width: 45%;
                margin-left: 2%;
                float: left;
            }

            #choice3 {
                width: 45%;
                margin-left: 2%;
                float: left;
            }
            #loginForm {
              margin-left: 50%;
              position: relative;
              width: 47%;
            }
            #loginForm .box .iText {
              width: 70%;
              margin: 0.2% 0;
              padding: 2.5% 3%;
              border: 1px solid #e1e1e1;
            }
            #loginForm .box p {
              margin-top: 1em;
            }
            #loginForm .box p input {
              height: 18px;
              font-size: 11px;
              color: #737373;
              line-height: 18%;
              vertical-align: middle;
            }
            #loginForm .loginBtn {
              margin-top: 14%;
              display: block;
              position: absolute;
              top: 0%;
              right: 0%;
              width: 18%;
              height: 41%;
              padding: 2.3%;
              border-radius: 5%;
              color: #fff;
              line-height: 60px;
              text-align: center;
              text-shadow: 1px 1px 1px #004773;
              background: #333;
            }
        }
      /* long size css */
      @media all and (min-width:1025px) {
        #sql {
          clear:both;
          float:left;
		      width: 40%;
          margin:1.5%;
        }
        #customer {
	        width: 23%;
	        margin-left: 1.7%;
          float:left;
        }
        #choice1 {
	        width: 23%;
	        margin-left: 1.7%;
          float:left;
        }
        #choice2 {
	        width: 23%;
	        margin-left: 1.7%;
          float:left;
        }
        #choice3 {
	        width: 22%;
	        margin-left: 1.7%;
          float:left;
        }
        #loginForm {
          margin-left: 50%;
          position: relative;
          width: 47%;
        }
        #loginForm .box .iText {
          width: 70%;
          margin: 0.2% 0;
          padding: 2.5% 3%;
          border: 1px solid #e1e1e1;
        }
        #loginForm .box p {
          margin-top: 1em;
        }
        #loginForm .box p input {
          height: 18px;
          font-size: 11px;
          color: #737373;
          line-height: 18%;
          vertical-align: middle;
        }
        #loginForm .loginBtn {
          margin-top: 11.5%;
          display: block;
          position: absolute;
          top: 0%;
          right: 0%;
          width: 18%;
          height: 41%;
          padding: 2.3%;
          border-radius: 5%;
          color: #fff;
          line-height: 60px;
          text-align: center;
          text-shadow: 1px 1px 1px #004773;
          background: #333;
        }
      }
    </style>
  </head>
  <body>
    <div id="wrapper">
      <nav>
        <ul>
          <li>
            <a href="http://daeguuniv.dothome.co.kr/">Home</a>
          </li>
          <li>
            <a href="http://daeguuniv.dothome.co.kr/about.html/">About</a>
          </li>
          <li>
            <a href="http://daeguuniv.dothome.co.kr/notice.html/">Notice</a>
          </li>
        </ul>
      </nav>
      <div id="sql">
        <img src="/sql injection.png"  alt="sql injection">
      </div>
      <div id="loginForm">
        <h1>LOGIN</h1>
        <form method="post" name="" action="">
           <div class="box">
            <input type="text" name="username" class="iText">
            <br>
            <input type="password" name="password" id="" class="iText">
            <br>
          </div>
          <input type="submit" class="loginBtn" value="로그인"></input>
        </form>
      </div>
      <hr>
        <div id="customer">
          <h3>Contact Us</h3>
          <ul id="contact">
            <li>
              <b>이용현</b> factor03100716@gmail.com
            </li>
            <li>
              <b>이재원</b> khbank.ubuntu@gmail.com
            </li>
            <li>
              <b>김대연</b> rlaqorfhr@naver.com
            </li>
            <li>
              <b>이한빈</b> mchv618@naver.com
            </li>
          </ul>
        </div>
        <div id="choice1" class="sub">
	    <div class="heading">
            <h3>Hacking</h3>
            <h4>web, reversing, system etc..</h4>
          </div>
        </div>
        <div id="choice2" class="sub">
          <div class="heading">
            <h3>Project</h3>
            <h4>SQL Injection</h4>
          </div>
        </div>
        <div id="choice3" class="sub">
          <div class="heading">
            <h3>etc..</h3>
            <h4>etc..</h4>
          </div>
        </div>
        <hr>
          <footer>
            <ul>
              <li>
                <a href="http://daeguuniv.dothome.co.kr/">Home</a>
              </li>
              <li>
                <a href="http://daeguuniv.dothome.co.kr/about.html/">About</a>
              </li>
              <li>
                <a href="http://daeguuniv.dothome.co.kr/notice.html/">Notice</a>
              </li>
            </ul>
            <p>Copyright (c) 2016 Copyright LJW All Rights Reserved.</p>
          </footer>
        </div>
  </body>
</html>
