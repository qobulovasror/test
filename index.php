<?php 
    function headerFun($link){
            header("Location:$link");
    }
    require('script/main.php');
    session_start();

    if(isset($_GET['fan'])){
      $_SESSION['testFan'] = $_GET['fan'];
      headerFun('test.php');
    }
    if(isset($_GET['admin'])){
      // if(condation){}
      headerFun('Admin/admin.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online test</title>
    <link rel="shortcut icon" href="img/faviicon.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/col.css" />
    <link rel="stylesheet" href="css/style2.css" />
  </head>
  <body>
    <!-- animation -->
        <?php 
          if(empty($_SESSION["auth"])){
            echo '
            <div class="animat-box" id="anim">
              <h2>Loading...</h2>
              <div class="box1">
                <img src="img/index-animat.png" alt="animat - img">
                <img src="img/index-animat.png" alt="animat - img">
                <img src="img/index-animat.png" alt="animat - img">
              </div>
            <div class="progres"><div class="prog-content"></div></div>
            </div>
            ';
          }
        ?>
    <header>
      <div class="container">
        <div class="menu row between fullMenu">
          <a href="index.php" class="logo">Online test</a>
          <ul class="row">
            <li><a href="#">Bosh sahifa</a></li>
            <li><a href="#about">Haqida</a></li>
            <li><a href="#categoris">Bo'limlar</a></li>
            <li><a href="#"><del>Blog</del></a></li>
            <li><a href="#contact">Bog'lanish</a></li>
          </ul>
          <div class="log row" id="userName">
            <?php 
                if(!empty($_SESSION["auth"])){
                  $login = $_SESSION["login"];
                  $cout = "<div class='profil'> <b>$login</b>
                          <ul class='prof-win'>
                              <li><a href='profil.php'>Profil sozlanmalari</a></li>
                  ";
                  if (!empty($_SESSION['admin']) and $_SESSION['admin'] = 'Admin01') {
                    $cout .= "<li><a href='?admin=0'>Admin panel</a></li>";
                  }
                  $cout .= "<li><a href='?logout=0'>Chiqish</a></li>
                          </ul>
                      </div>
                  ";
                  echo $cout;
                  if(isset($_GET['logout'])){
                    $_SESSION['admin'] = "false";
                    session_destroy();
                    headerFun("index.php");
                  }
                }else{
                  echo "<a href='login.php' class='login'>Kirish</a>
                      <h3>/</h3>
                      <a href='regstr.php' class='regs'>Ro`yxatdan o`tish</a>";
                }
            ?>
            
          </div>
        </div>
        <div class="respMenu">
          <div class="row between">
            <a href="index.html" class="logo">Online test</a>
            <i onclick="menu()" class='bx bx-menu'></i>
          </div>
          <div id ='rightMenu' class="rightMenu rightMenuNoActive">
            <ul class="column">
              <i onclick="menuClose()" class='bx bx-x'></i>
              <li><a href="#">Bosh sahifa</a></li>
              <li><a onclick="menuClose()" href="#about">Haqida</a></li>
              <li><a onclick="menuClose()" href="#categoris">Bo'limlar</a></li>
              <li><a onclick="menuClose()" href="#"><del>Blog</del></a></li>
              <li><a onclick="menuClose()" href="#contact">Bog'lanish</a></li>
            </ul>
            <div class="log column" id="userName">
               <?php 
                if(!empty($_SESSION["auth"])){
                  $login = $_SESSION["login"];
                  $cout = "<ul class='column'>
                              <li><a href='profil.php'><b>$login</b></a></li>
                  ";
                  if (!empty($_SESSION['admin']) and $_SESSION['admin'] = 'Admin01') {
                    $cout .= "<li><a href='?admin=0'>Admin panel</a></li>";
                  }
                  $cout .= "<li><a href='?logout=0'>Chiqish</a></li>
                          </ul>
                  ";
                  echo $cout;
                }else{
                  echo "<a onclick='menuClose()' href='login.php' class='login'>Kirish</a>
                  <a onclick='menuClose()' href='regstr.php' class='regs'>Ro`yxatdan o`tish</a>";
                }
               ?>
              
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="banner">
      <div class="banner-back">
        <div class="container">
          <div class="column">
            <h3 class="banner-title">
              Online test ishlash platformasiga<br />
              <span id="xushText"></span>
            </h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
              laboriosam modi eligendi quis ipsa odio blanditiis fugiat. Enim,
              culpa repellendus!
            </p>
            <div class="row">
              <?php 
                session_start();
                if(!empty($_SESSION["auth"])){
                  if($_SESSION['userType'] == 'student'){
                    echo '<a href="#categoris">Testni boshlash</a>';
                  }else{
                    echo '<a href="inScience.php">Testni joylash</a>';
                  }
                }else{
                    echo '<a href="login.php">Testni boshlash</a>';
                    echo '<a href="login.php">Testni joylash</a>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="about">
      <div class="respAbout">
        <div class="container">
          <div class="bar-title">#Haqida</div>
          <div class="row">
            <div class="column">
              <h3>
                Online test ishlash uchun muljallangan web saytimizga xush
                kelibsiz
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dolor
                sint illum magni animi quasi excepturi laudantium. Quibusdam quasi
                deleniti similique nemo, minus ullam soluta accusantium error
                debitis vitae architecto.
              </p>
              <button onclick="window.open('#')">Ko'proq bilish</button>
            </div>
            <img src="img/about.jpg" alt="aboutImg" />
          </div>
        </div>
      </div>
    </div>
    <div id="categoris">
      <div class="container">
        <div class="bar-title">#Bo'limlar</div>
        <div class="nav">
          <ul class="row wrap" id="secectMenu">
            <li class="all active" onclick="select(this)">Barchasi</li>
            <li class="coder" onclick="select(this)">Dasturlash oid fanlar</li>
            <li class="exact" onclick="select(this)">Aniq fanlar</li>
            <li class="socal" onclick="select(this)">Ishtimoiy fanlar</li>
            <li class="other" onclick="select(this)">boshqa fanlar</li>
          </ul>
        </div>
        <div class="row wrap around" id="categor">
          
          <?php 

            $query="SELECT * FROM fan WHERE fanId>0 ORDER BY name";
            $result = mysqli_query($link,$query);
            for ($data = []; $row = mysqli_fetch_assoc( $result); $data[] = $row); 
            $content='';
            foreach ($data as $value) {
              $content .= '<a href="?fan='.$value['name'] .'" class="item coder">';
              $content .= '<img src="img/categor.jpg" alt="categores img" />';
              $content .= "<h5>". $value['name']."(".$value['testCount'].') </h5>';
              $content .= '</a>';
            }

              echo $content;

           ?>

          <a href="#" class="item coder">
            <img src="img/categor.jpg" alt="categores img" />
            <h5>Dasturlash asoslari</h5>
          </a>

          <!-- a href="#" class="item coder">
            <img src="img/categor.jpg" alt="categores img" />
            <h5>Python dasturlash tili va kutubxonalari</h5>
          </a>

          <a href="#" class="item coder">
            <img src="img/categor.jpg" alt="categores img" />
            <h5>Ma'lumotlar bazasi</h5>
          </a> -->

        </div>
      </div>
    </div>
    <footer id="contact">
        <div class="container">
            <div class="bar-title">#Bog'lanish</div>
            <div class="row">
                <div class="item item1 column">
                  <h4>Online test ishlash</h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum commodi eos blanditiis pariatur laboriosam tenetur dolor ex facilis, dolorum officia laudantium minima voluptatibus ratione atque aliquam in sed unde magnam?</p>
                </div>
                <div class="item column">
                  <h4>Boshqa sahifalarga o'tish</h4>
                  <ul class="column">
                    <li><a href="#"># Bosh sahifa</a></li>
                    <li><a href="#about"># Haqida</a></li>
                    <li><a href="#categoris"># Bo'limlar</a></li>
                    <li><a href="login.php">Kirish</a></li>
                    <li><a href="regstr.php">Ro'yxatdan o'tish</a></li>
                  </ul>
                </div>
                <div class="item column">
                  <h4>Bo'glanish turlari</h4>
                  <ul class="column">
                    <li><i class="bx bx-phone"></i><b>Tel 1:</b> +998 (93) 358 28 27</li>
                    <li><i class="bx bx-phone"></i><b>Tel 2:</b> +998 (93) 724 92 03</li>
                    <li><a href="#"><i class="bx bx-mail-send"></i><b>Gmail:</b> qobulovasror0@gmail.com</a></li>
                    <li><a href="#"><i class="bx bxl-telegram"></i>Telegram</a></li>
                    <li><a href="#"><i class="bx bxl-facebook"></i>Facebook</a></li>
                  </ul>
                </div>
            </div>
            <hr>
            <div class="row between">
              <div class="copry">
                <h5>Copyright &copy; 2021 All rights reserved | This site is made with by <a href="#">Qobulov Asror</a></h5>
              </div>
              <form action="#" id="mailsend">
                <input type="text" placeholder="Email">
                <input type="submit" value="Send">
              </form>
            </div>
        </div>
    </footer>
    <script src="script/scriptIndex.js"></script>
  </body>
</html>

