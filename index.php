<?php
session_start();
include 'php/config.php';

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Fetch user balance
    $username = $_SESSION['username'];
    $sql = "SELECT balance FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();

    // Store balance in session
    $_SESSION['balance'] = $balance;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>NiqqasharpBet</title>
    <link rel="icon" type="image/x-icon" href="./imgbet/opay-removebg-preview.png" class="yyy">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="./details/ID001.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./bet.css">
    <link rel="stylesheet" href="./bet1.css">
    <link rel="stylesheet" href="./options/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
        
        
    <section class="all">   
    <div class="niqqa">
        <h1>NiqqasharpBet</h1>

        <div class="sharp">
        <?php if (isset($_SESSION['username'])): ?>
            <a id="mo" href="./search.html">🔍</a>
            <a id="om" href="./profile.php">💰 $<?php echo htmlspecialchars(number_format($_SESSION['balance'], 2)); ?></a>
            <li><a id="profile" href="./profile.php">Profile</a></li>
        <?php else: ?>
            <a id="mo" href="./signup.html">Join Now</a>
            <a id="om" href="./login.html">Log In</a>
        <?php endif; ?>
        </div>
    </div>


<!-- Section to Display the Match Scores -->


<!-- Table to display live scores -->



        
    <div>
        <div class="slider-container">
                <div class="slider">
                  <img src="./imgbet/msp1.webp" alt="Image 1" class="slide">
                  <img src="./imgbet/msp2.webp" alt="Image 2" class="slide">
                  <img src="./imgbet/msp3.webp" alt="Image 3" class="slide">
                  <img src="./imgbet/msp4.webp" alt="Image 3" class="slide">
                </div>
        </div>

        <div class="container-2" 1>
            <div class="slider-wrapper">
              <button id="prev-slide" class="slide-button material-symbols-rounded">
                chevron_left
              </button>
              <ul class="image-list">
                <div class="image-item">
                    <a href="./hours/outrights.html"><img class="ii" src="./imgbet/access.png"  alt="">
                    <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                    <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item">
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
                <div class="image-item" >
                    <a href=""><img class="ii" src="./imgbet/access.png"  alt="">
                        <h4>football</h4></a>
                </div> 
            </ul>
            <button id="next-slide" class="slide-button material-symbols-rounded">
            chevron_right
            </button>
            </div>
            <div class="slider-scrollbar">
              <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
              </div>
            </div>
        </div>



        <div class="container-2" 2>
            <div class="slider-wrapper">
              <button id="prev-slide" class="slide-button material-symbols-rounded">
                chevron_left
              </button>
              <ul class="image-list">
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href="./hours/outrights.html"><h4 id="ii">MY FAVOURITE</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href="./hours/outrights.html"><h4>TODAY'S FOOTBALL</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>FOOTBALL IN NXT 3HRS</h4></a>
                </div>  
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>FOOTBALL IN NXT 8HRS</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>FOOTBALL IN NXT 24HRS</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>TOMORROW FOOTBALL</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>TODAY'S FOOTBALL</h4></a>
                </div>
                <div class="image-item" id="image-item">
                    <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                    <a href=""><h4>TODAY'S FOOTBALL</h4></a>
                </div>
            </div>
            <div class="slider-scrollbar">
              <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
              </div>
            </div>
        </div>

        <div class="part2">
            <nav class="navel">
                <ul>
                    <li><a href="#"><img src="./imgbet/kuda.png" alt=""></a></li>
                    <li id="li"><a href="#"><img src="./imgbet/kuda.png" alt=""><h5>UEFA CHAMPIONS LEAGUE</h5></a></li>
                    <li><a href="#"><img src="./imgbet/kuda.png" alt=""></a></li>
                </ul>
            </nav>
            <div class="container-2">
                <div class="slider-wrapper">
                  <button id="prev-slide" class="slide-button material-symbols-rounded">
                    chevron_left
                  </button>
                <ul class="image-list">
                    <div class="image-item" id="image-item1">
                        <div class="conti">
                            <div class="conti" href="/details/ID001.html">
                                <div class="hot"><h6>HOT</h6><i class="fa fa-user"></i><span>international freindly games</span></div>
                                <div class="klass" data-match-id="1">
                                    <div class="team">
                                        <img src="./imgbet/opay-removebg-preview.png" alt="">
                                        <h3>Argentina</h3>
                                        <button class="activeElement" data-id="btn1" data-base="HOME" data-odds="2.69" data-detail="Spartan f.c vs Royal f.c" data-match-id="1" data-mini="1x2">1 2.69 <span></span></button>
                                        <!-- <button class="activeElement">1 10.00</button> -->
                                    </div>
                                    <div class="time" id="id001">
                                        <a href="./details/ID001.html" style="color: white;">
                                            <!-- Initially hidden -->
                                            <h6 id="score-1" style="display: none;">0-0</h6>
                                            <p id="time-1" style="display: none;">live <span>7:00am </span></p>
                                            <h6 class="h1">1x2</h6>
                                        </a>
                                        <button class="activeElement" data-id="btn2" data-base="DRAW" data-odds="1.40" data-detail="Spartan f.c vs Royal f.c" data-match-id="1" data-mini="1x2"> x 1.40 <span></span></button>
                                        <!-- <button class="activeElement">x 10.00</button> -->
                                    </div>
                                    <div class="team">
                                        <img src="./imgbet/opay-removebg-preview.png" alt="">
                                        <h3>Argentina</h3>
                                        <button class="activeElement" data-id="btn3" data-base="AWAY" data-odds="2.69" data-detail="Spartan f.c vs Royal f.c" data-match-id="1" data-mini="1x2">2.69 <span></span></button>
                                        <!-- <button class="activeElement">2 10.00</button> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="image-item" id="image-item1">
                        <div class="conti">
                            <div class="conti" href="">
                                <div class="hot"><h6>HOT</h6><i class="fa fa-user"></i><span>international freindly games</span></div>
                                <div class="klass" data-match-id="1">
                                <div class="team">
                                    <img src="./imgbet/IMG-20230818-WA0020-removebg-preview.png" alt="">
                                    <h3>niqqahs</h3>
                                    <button class="activeElement">1 10.00</button>
                                </div>
                                <div class="time" id="id001">
                                        <a href="./details/ID001.html" style="color: white;">
                                            <!-- Initially hidden -->
                                            <h6 id="score-1" style="display: none;">0-0</h6>
                                            <p id="time-1" style="display: none;">live <span>75:00 H1</span></p>
                                            <h6 class="h6">1x2</h6>
                                        </a>
                                        <button class="activeElement">x 10.00</button>
                                </div>
                                <div class="team">
                                    <img src="./imgbet/yung.png" alt="">
                                    <h3>Futu</h3>
                                    <button class="activeElement">2 10.00</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-item" id="image-item1">
                        <div class="conti">
                            <div class="conti" href="">
                            <div class="hot"><h6>HOT</h6><i class="fa fa-user"></i><span>international freindly games</span></div>
                            <div class="klass">
                                        <div class="team">
                                            <img src="./imgbet/opay-removebg-preview.png" alt="">
                                            <h3>Argentina</h3>
                                            <button class="activeElement">1 10.00</button>
                                        </div>
                                        <div class="time" id="match-001">
                                            <a href="" style="color: white;">
                                                <h6 id="score-001">0-0</h6> <!-- Score element -->
                                                <p id="status-001">live <span id="time-001">75:00 H1</span></p> <!-- Time and status -->
                                                <h6 class="h6">1x2</h6>
                                            </a>
                                            <button class="activeElement">x 10.00</button>
                                        </div>
                                        <div class="team">
                                            <img src="./imgbet/opay-removebg-preview.png" alt="">
                                            <h3>Argentina</h3>
                                            <button class="activeElement">2 10.00</button>
                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </ul>
                <div class="slider-scrollbar">
                  <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                  </div>
                </div>
            </div>
            <div class="combine">
                <div class="fix"><h4>Live</h4></div>
                <div class="container-2">
                    <div class="slider-wrapper">
                      <button id="prev-slide" class="slide-button material-symbols-rounded">
                        chevron_left
                      </button>
                      <ul class="image-list" id="fix">
                        <div class="image-item">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href="#"><h4>football</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href="#"><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href=""><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                           <a href=""> <h4>football</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href=""><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>deans cup</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>VC'S cup</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>VC'S cup</h4></a>
                        </div> 
                        <div class="image-item" >
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>SUG cup</h4></a>
                        </div> 
                        <!-- <img class="image-item" src="imgbet/gt.png" alt="img-2" />
                        <img class="image-item" src="imgbet/kuda.png" alt="img-3" />
                        <img class="image-item" src="imgbet/master.png" alt="img-4" />
                        <img class="image-item" src="imgbet/opay-removebg-preview.png" alt="img-5" />
                        <img class="image-item" src="imgbet/quickteller.png" alt="img-6" />
                        <img class="image-item" src="imgbet/uba.png" alt="img-7" />
                        <img class="image-item" src="imgbet/verve-removebg-preview.png" alt="img-8" />
                        <img class="image-item" src="imgbet/verve-removebg-preview.png" alt="img-9" />
                        <img class="image-item" src="imgbet/gt.png" alt="img-10" /> -->
                      </ul>
                      <button id="next-slide" class="slide-button material-symbols-rounded">
                        chevron_right
                      </button>
                    </div>
                    <div class="slider-scrollbar">
                      <div class="scrollbar-track">
                        <div class="scrollbar-thumb"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="container-2">
                <div class="slider-wrapper">
                  <button id="prev-slide" class="slide-button material-symbols-rounded">
                    chevron_left
                  </button>
                  <ul class="image-list" id="fix">
                    <div class="image-item">
                        <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                        <a href="#"class="menu-link1" onclick="loadContent1('goorno.html', 'content1')"><h4>1x2</h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('handicap.html', 'content1')"><h4>Over/Under</h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent('bet.html', 'content1')"><h4>Next<span style="margin-left: 0.2em;">Goal</span></h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>Double<span style="color: red;margin-left: 0.3em;">chance</span></h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>Handicap</h4></a>
                    </div>
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>GG/NG</h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>Home O/U</h4></a>
                    </div> 
                    <div class="image-item" id="fix">
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>Away O/U</h4></a>
                    </div> 
                    <div class="image-item" >
                        <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                        <a href=""class="menu-link1" onclick="loadContent1('bet.html', 'content1')"><h4>SUG cup</h4></a>
                    </div> 
                   </ul>
                   <div class="content1" id="content1">
                    <!-- Content will be loaded here -->
                    </div>  
                  <button id="next-slide" class="slide-button material-symbols-rounded">
                    chevron_right
                  </button>
                </div>
                <div class="slider-scrollbar">
                  <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                  </div>
                </div>
            </div>
            <div class="combine">
                <div class="fix"><h4>Sports</h4></div>
                <div class="container-2">
                    <div class="slider-wrapper">
                      <button id="prev-slide" class="slide-button material-symbols-rounded">
                        chevron_left
                      </button>
                    <ul class="image-list" >
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href="#"><h4>football</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href="#"><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href=""><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                           <a href=""> <h4>football</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png"  alt=""> -->
                            <a href=""><h4>basketball</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>deans cup</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>VC'S cup</h4></a>
                        </div> 
                        <div class="image-item" id="fix">
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>VC'S cup</h4></a>
                        </div> 
                        <div class="image-item" >
                            <!-- <img class="ii" src="imgbet/access.png" alt=""> -->
                            <a href=""><h4>SUG cup</h4></a>
                        </div> 
                    </ul>
                   
                      <button id="next-slide" class="slide-button material-symbols-rounded">
                        chevron_right
                      </button>
                    </div>
                    <div class="slider-scrollbar">
                      <div class="scrollbar-track">
                        <div class="scrollbar-thumb"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="container-2">
                <div class="slider-wrapper">
                  <button id="prev-slide" class="slide-button material-symbols-rounded">
                    chevron_left
                  </button>
                  <ul class="image-list" id="fix">
                    <div class="image-item">
                      <li><a href="#section1" class="menu-link" data-section="section1"><h4>1X2</h4></a></li>
                        <!-- <a href="#"class="menu-link1" onclick="loadContent1('goorno.html', 'content1')"><h4>My Favourites</h4></a> -->
                    </div> 
                    <div class="image-item" id="fix">
                      <li><a href="#section2" class="menu-link" data-section="section2"><h4>Over/Under</h4></a></li>
                        <!-- <a href=""class="menu-link1" onclick="loadContent1('handicap.html', 'content1')"><h4>All</h4></a> -->
                    </div> 
                    <div class="image-item" id="fix">
                      <li><a href="#section3" class="menu-link" data-section="section3"><h4>Double<span style="margin-left: 0.2em;">chance</span></h4></a></li>
                        <!-- <a href=""class="menu-link1" onclick="loadContent('bet.html', 'content1')"><h4>Goals</h4></a> -->
                    </div> 
                    <div class="image-item">
                      <li><a href="#section4" class="menu-link" data-section="section4"><h4>GG/NG</h4></a></li>
                        <!-- <a href="#"class="menu-link1" onclick="loadContent1('goorno.html', 'content1')"><h4>My Favourites</h4></a> -->
                    </div>  
                    <div class="image-item">
                      <li><a href="#section5" class="menu-link" data-section="section5"><h4>1stHalf<span style="margin-left: 0.2em;">-</span><span style="margin-left: 0.2em;"></span>1x2</h4></a></li>
                        <!-- <a href="#"class="menu-link1" onclick="loadContent1('goorno.html', 'content1')"><h4>My Favourites</h4></a> -->
                    </div> 
                    <div class="image-item">
                        <li><a href="#section6" class="menu-link" data-section="section5"><h4>1st<span style="margin-left: 0.2em;">Half</span><span style="margin-left: 0.2em;"></span>O/U</h4></a></li>
                          <!-- <a href="#"class="menu-link1" onclick="loadContent1('goorno.html', 'content1')"><h4>My Favourites</h4></a> -->
                      </div> 
                    </ul>
                    <div class="content1" id="content1">
                    <!-- Content will be loaded here -->
                    </div>  
                  <button id="next-slide" class="slide-button material-symbols-rounded">
                    chevron_right
                  </button>
                </div>
                <div class="slider-scrollbar">
                  <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                  </div>
                </div>
            </div>
            <div class="content1">

                <!-- SECTION ID ONE(01) FOR 1X2 -->
            
                <div id="section1" class="section1 active">
                <div class="num">
                    <div class="tue">
                        <h4>26/03 Tuesday</h4>
                    </div>
                    <div class="dee">
                        <h3>1</h3>
                        <h3>x</h3>
                        <h3>2</h3>
                    </div>
                    
                </div>
    <div class="full-det" data-match-id="5">
    <div class="let">
        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
        <i class="fa fa-user"></i>
    </div>
    <div class="details">
        <div class="det">
            <a href="#">
                <h4>Slh Horsfords St.Pauls</h4>
                <h4>Slh Horsfords St.Pauls</h4>
            </a>
        </div>
        <div class="timer" id="id001">
            <a href="" style="color: white;">
                <!-- Score and Time initially visible, JavaScript will update as necessary -->
                <h6 id="score-5">0 <br> 0</h6>
                <p id="time-5">live <span>75:00 H1</span></p>
            </a>
            <div class="ails"> 
                <div class="conbor">
                    <button class="activeElement" data-id="btn1" data-base="HOME" data-odds="2.69" data-detail="Niqqasharp vs Future f.c" data-mini="1x2">4.40</button>
                    <button class="activeElement" data-id="btn2" data-base="DRAW" data-odds="3.10" data-detail="Niqqasharp vs Future f.c" data-mini="1x2">2.10</button>
                    <button class="activeElement" data-id="btn3" data-base="AWAY" data-odds="2.50" data-detail="Niqqasharp vs Future f.c" data-mini="1x2">2.50</button>
                </div>                       
            </div>
        </div>
        <div class="corn">
            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
        </div>
    </div>
    </div>
    

<!-- Repeat for other matches, with unique data-match-id for each -->

        <div class="full-det" data-match-id="3">
            <div class="let">
                <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="det">
                    <a href="#">
                        <h4>Slh Horsfords St.Pauls</h4>
                        <h4>Slh Horsfords St.Pauls</h4>
                    </a>
                </div>
                <div class="timer" id="id001">
                    <a href="" style="color: white;">
                    <!-- Initially hidden -->
                        <h6 id="score-3" style="display: none;">0 <br> 0</h6>
                        <p id="time-3" style="display: none;">live <span>75:00 H1</span></p>
                    </a>
                    <div class="ails"> 
                    <div class="conbor">
                        <button class="activeElement" data-id="btn5" data-base="HOME" data-odds="2.69" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">1.40 <span></span></button>
                        <button class="activeElement" data-id="btn6" data-base="DRAW" data-odds="3.10" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">4.10</button>
                        <button class="activeElement" data-id="btn7" data-base="AWAY" data-odds="2.50" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">7.00</button>
                    </div>                       
                </div>
            </div>
            <div class="corn">
                <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
            </div>
            <div class="corn">
                <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
        </div>

<!-- Repeat for other matches, with unique data-match-id for each -->

        <div class="full-det" data-match-id="2">
            <div class="let">
                <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="det">
                    <a href="#">
                        <h4>Slh Horsfords St.Pauls</h4>
                        <h4>Slh Horsfords St.Pauls</h4>
                    </a>
                </div>
                <div class="timer" id="id001">
                    <a href="" style="color: white;">
                    <!-- Initially hidden -->
                        <h6 id="score-2" style="display: none;">0 <br> 0</h6>
                        <p id="time-2" style="display: none;">live <span>00:00 H1</span></p>
                    </a>
                    <div class="ails"> 
                    <div class="conbor">
                        <button class="activeElement" data-id="btn5" data-base="HOME" data-odds="2.69" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">1.40 <span></span></button>
                        <button class="activeElement" data-id="btn6" data-base="DRAW" data-odds="3.10" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">4.10</button>
                        <button class="activeElement" data-id="btn7" data-base="AWAY" data-odds="2.50" data-detail="Spartan f.c vs Royal f.c" data-mini="1x2">7.00</button>
                    </div>                       
                </div>
            </div>
            <div class="corn">
                <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
            </div>
            <div class="corn">
                <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
        </div>
                </div>
            
                  <!-- SECTION ID TWO(2)  FOR OVER/UNDER-->
            
                <div id="section2" class="section1">
                <div class="container-2">
                    
                </div>
                <div class="num">
                    <div class="tue">
                        <h4>26/03 Tuesday</h4>
                    </div>
                    <div class="dee2">
                        <h3>Over</h3>
                        <!-- <h3>x</h3> -->
                        <h3>Under</h3>
                    </div>
                    
                </div>
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Slh Horsfords St.Pauls</h4>
                                <h4>Slh Horsfords St.Pauls</h4>
                            </a>
                        </div>
                        <div class="container2">
                            <!-- Display selected option -->
                            <button id="selectedOption" onclick="toggleDropdown()" class="dropbtn">0.5</button>
                            <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                        
                                <!-- Container for the div elements -->
                                <div id="divContainer" class="options-container" style="display: flex;">
                                <!-- Two div elements to be changed -->
                                <div id="div1" class="option">0.5</div>
                                <div id="div2" class="option">11</div>
                                </div>
                                
                            <!-- Dropdown Content (Hidden by Default) -->
                            <div id="myDropdown" class="dropdown-content">
                                <a class="active" href="javascript:void(0)" onclick="selectOption('0.5')">0.5</a>
                                <a  href="javascript:void(0)" onclick="selectOption('1.5')">1.5</a>
                                <a href="javascript:void(0)" onclick="selectOption('3.5')">3.5</a>
                                <a href="javascript:void(0)" onclick="selectOption('2.5')">2.5</a>
                                <a href="javascript:void(0)" onclick="selectOption('4.5')">4.5</a>
                                <a href="javascript:void(0)" onclick="selectOption('3')">3</a>
                            </div>
                            </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                <!-- ID TWO -->
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Slh Horsfords St.Pauls</h4>
                                <h4>Slh Horsfords St.Pauls</h4>
                            </a>
                        </div>
                        <div class="container3">
                            <!-- Display selected option -->
                            <button id="selectedOption2" onclick="toggleDropdown2()" class="dropbtn2">0.5</button>
                            <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                        
                            <!-- Container for the div elements -->
                            <div id="divContainer2" class="options-container" style="display: flex;">
                                <!-- Two div elements to be changed -->
                                <div id="div3" class="option2">0.5</div>
                                <div id="div4" class="option2">11</div>
                            </div>
                        
                            <!-- Dropdown Content (Hidden by Default) -->
                            <div id="myDropdown2" class="dropdown2-content">
                            <a href="javascript:void(0)" onclick="selectOption2('0.5')">0.5</a>
                            <a href="javascript:void(0)" onclick="selectOption2('1.5')">1.5</a>
                            <a href="javascript:void(0)" onclick="selectOption2('3.5')">3.5</a>
                            <a href="javascript:void(0)" onclick="selectOption2('2.5')">2.5</a>
                            <a href="javascript:void(0)" onclick="selectOption2('4.5')">4.5</a>
                            <a href="javascript:void(0)" onclick="selectOption2('3')">3</a>
                            </div>
                        </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                <!-- ID THREE UNTOUCHED -->
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Slh Horsfords St.Pauls</h4>
                                <h4>Slh Horsfords St.Pauls</h4>
                            </a>
                        </div>
                        <div class="container3">
                            <!-- Display selected option -->
                            <button id="selectedOption2" onclick="toggleDropdown2()" class="dropbtn2">0.5</button>
                            <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                        
                                <!-- Container for the div elements -->
                                <div id="divContainer2" class="options-container" style="display: flex;">
                                <!-- Two div elements to be changed -->
                                <div id="div3" class="option2">0.5</div>
                                <div id="div4" class="option2">11</div>
                                </div>
                        
                            <!-- Dropdown Content (Hidden by Default) -->
                            <div id="myDropdown2" class="dropdown2-content">
                                <a href="javascript:void(0)" onclick="selectOption2('0.5')">0.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('1.5')">1.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('3.5')">3.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('2.5')">2.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('4.5')">4.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('3')">3</a>
                            </div>
                            </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                </div>
            
                  <!-- SECTION ID THREE(3) FOR DOUBLE CHANCE-->
            
                <div id="section3" class="section1">
                <div class="num">
                    <div class="tue">
                        <h4>26/03 Tuesday</h4>
                    </div>
                    <div class="dee">
                        <h3>1X</h3>
                        <h3>12</h3>
                        <h3>X2</h3>
                    </div>
                    
                </div>
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Niqqasharp</h4>
                                <h4>Future F.C</h4>
                            </a>
                        </div>
                        <div class="ails"> 
                            <div class="conbor">
                                <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                            </div>                       
                        </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Niqqasharp</h4>
                                <h4>Future F.C</h4>
                            </a>
                        </div>
                        <div class="ails"> 
                            <div class="conbor">
                                <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                            </div>                       
                        </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                <div class="full-det">
                    <div class="let">
                        <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="det">
                            <a href="#">
                                <h4>Niqqasharp</h4>
                                <h4>Future F.C</h4>
                            </a>
                        </div>
                        <div class="ails"> 
                            <div class="conbor">
                                <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                            </div>                       
                        </div>
                    </div>
                    <div class="corn">
                        <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
                </div>

                  <!-- SECTION ID THREE(3) FOR DOUBLE CHANCE-->
            
                <div id="section4" class="section1">
                    <div class="num">
                        <div class="tue">
                            <h4>26/03 Tuesday</h4>
                        </div>
                        <div class="deel">
                            <h3>GG</h3>
                            <!-- <h3>12</h3> -->
                            <h3>NG</h3>
                        </div>
                        
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Niqqasharp</h4>
                                    <h4>Future F.C</h4>
                                </a>
                            </div>
                            <div class="ails-remix"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <!-- <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button> -->
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Niqqasharp</h4>
                                    <h4>Future F.C</h4>
                                </a>
                            </div>
                            <div class="ails-remix"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <!-- <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button> -->
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Niqqasharp</h4>
                                    <h4>Future F.C</h4>
                                </a>
                            </div>
                            <div class="ails-remix"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <!-- <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button> -->
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                </div>

                <!-- SECTION ID ONE(01) FOR 1ST HALF -->
            
                <div id="section5" class="section1">
                    <div class="num">
                        <div class="tue">
                            <h4>26/03 Tuesday</h4>
                        </div>
                        <div class="dee">
                            <h3>1</h3>
                            <h3>x</h3>
                            <h3>2</h3>
                        </div>
                        
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="ails"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="ails"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="ails"> 
                                <div class="conbor">
                                    <button class="activeElement" data-odds="2.69" data-detail="Home team to win with odds " data-mini="1x2">HOME <span></span></button>
                                    <button class="activeElement" data-odds="3.10" data-detail="draw team to win with odds" data-mini="1x2">DRAW</button>
                                    <button class="activeElement" data-odds="2.50" data-detail="Away team to win with odds" data-mini="1x2">AWAY</button>
                                </div>                       
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                </div>

                 <!-- SECTION ID TWO(2)  FOR 1ST HALF OVER/UNDER-->
            
                 <div id="section6" class="section1">
                    <div class="container-2">
                        
                    </div>
                    <div class="num">
                        <div class="tue">
                            <h4>26/03 Tuesday</h4>
                        </div>
                        <div class="dee2">
                            <h3>Over</h3>
                            <!-- <h3>x</h3> -->
                            <h3>Under</h3>
                        </div>
                        
                    </div>
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="container2">
                                <!-- Display selected option -->
                                <button id="selectedOption" onclick="toggleDropdown()" class="dropbtn">0.5</button>
                                <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                            
                                    <!-- Container for the div elements -->
                                    <div id="divContainer" class="options-container" style="display: flex;">
                                    <!-- Two div elements to be changed -->
                                    <div id="div1" class="option">0.5</div>
                                    <div id="div2" class="option">11</div>
                                    </div>
                            
                                <!-- Dropdown Content (Hidden by Default) -->
                                <div id="myDropdown" class="dropdown-content">
                                    <a class="active" href="javascript:void(0)" onclick="selectOption('0.5')">0.5</a>
                                    <a  href="javascript:void(0)" onclick="selectOption('1.5')">1.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption('3.5')">3.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption('2.5')">2.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption('4.5')">4.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption('3')">3</a>
                                </div>
                                </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <!-- ID TWO -->
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="container3">
                                <!-- Display selected option -->
                                <button id="selectedOption2" onclick="toggleDropdown2()" class="dropbtn2">0.5</button>
                                <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                            
                                <!-- Container for the div elements -->
                                <div id="divContainer2" class="options-container" style="display: flex;">
                                    <!-- Two div elements to be changed -->
                                    <div id="div3" class="option2">0.5</div>
                                    <div id="div4" class="option2">11</div>
                                </div>
                            
                                <!-- Dropdown Content (Hidden by Default) -->
                                <div id="myDropdown2" class="dropdown2-content">
                                <a href="javascript:void(0)" onclick="selectOption2('0.5')">0.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('1.5')">1.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('3.5')">3.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('2.5')">2.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('4.5')">4.5</a>
                                <a href="javascript:void(0)" onclick="selectOption2('3')">3</a>
                                </div>
                            </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <!-- ID THREE UNTOUCHED -->
                    <div class="full-det">
                        <div class="let">
                            <h1><p>1:00 <span>ID 21082 Saint Kit and Neves - Premier League</span></p></h1>
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="det">
                                <a href="#">
                                    <h4>Slh Horsfords St.Pauls</h4>
                                    <h4>Slh Horsfords St.Pauls</h4>
                                </a>
                            </div>
                            <div class="container3">
                                <!-- Display selected option -->
                                <button id="selectedOption2" onclick="toggleDropdown2()" class="dropbtn2">0.5</button>
                                <i class="fa fa-angle-down" aria-hidden="true" style="margin-left: -0.9em;margin-top: -0.5em;"></i>
                            
                                    <!-- Container for the div elements -->
                                    <div id="divContainer2" class="options-container" style="display: flex;">
                                    <!-- Two div elements to be changed -->
                                    <div id="div3" class="option2">0.5</div>
                                    <div id="div4" class="option2">11</div>
                                    </div>
                            
                                <!-- Dropdown Content (Hidden by Default) -->
                                <div id="myDropdown2" class="dropdown2-content">
                                    <a href="javascript:void(0)" onclick="selectOption2('0.5')">0.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption2('1.5')">1.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption2('3.5')">3.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption2('2.5')">2.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption2('4.5')">4.5</a>
                                    <a href="javascript:void(0)" onclick="selectOption2('3')">3</a>
                                </div>
                                </div>
                        </div>
                        <div class="corn">
                            <a href="#">+175 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                 </div>
            </div>
           
            <div class="ed">
                <h6>View More <i class="fa fa-angle-right" aria-hidden="true"></i></h6>
            </div>
            </div>
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="">ho,w</a></li>
                    <li><a href="">ho,w</a></li>
                </ul>
            </nav>
        </div>
       
    </section >

        
    <div class="bet-slip" id="bet-slip">
        <div class="bet-slip-arrow" id="bet-slip-arrow" style="cursor: pointer;">&#9660;</div>
        <h3>Bet Slip</h3>
        <button id="clear-bet-slip"><div class="bone"><i class="fa fa-trash" aria-hidden="true"></i> Remove All</div><div class="btwo">Bet settings <i class="fa fa-cog" aria-hidden="true"></i> </div></button>
        <div class="bet-types">
          <button id="single-bet" class="bet-type-btn">Single</button>
          <button id="multiple-bet" class="bet-type-btn">Multiple</button>
          <button id="system-bet" class="bet-type-btn">System</button>
      </div>
        <div class="bet-slip-content">
            <p>No bets added yet.</p>
        </div>
        <div id="load-bet-code-container">
             <input type="text" id="bet-code-input" placeholder="Enter Bet Code">
             <button id="load-bet-code-btn">Load Bet Code</button>
        </div>
            

        <div class="bet-slip-total">
            Total Odds: <span id="total-odds">0</span><br>
            
            <div class="bet-amount-container">
              Bet Amount: $<input type="number" id="bet-amount" value="100" min="0" placeholder="min10">
              <div id="bet-amount-warning" class="validation-message"></div>
            </div>      
            <br>
            <div class="numeric-keypad" id="numeric-keypad">
              <div class="above">
                <button data-value="+1000">+1000</button>
                <button data-value="+500">+500</button>
                <button data-value="+100">+100</button>
              </div>
              <button data-value="1">1</button>
              <button data-value="2">2</button>
              <button data-value="3">3</button>
              <button data-value="4">4</button>
              <button data-value="5">5</button>
              <button data-value="6">6</button>
              <button data-value="7">7</button>
              <button data-value="8">8</button>
              <button data-value="9">9</button>
              <button data-value="0">0</button>
              <button data-value="00">00</button>
              <button data-value="clear">C</button>
              <button data-value=".">.</button>
              <button data-value="backspace"><i class="fa fa-backspace"></i></button>
              <button data-value="done">Done</button>
          </div>
          
            Potential Return: $<span id="potential-return">0</span>
        </div>
        <div class="bet-slip-footer">
          <button class="book-bet-btn" id="book-bet-btn">Book Bet</button>
          <button class="place-bet-btn" id="placeBetBtn">Place Bet</button>
      </div>
    </div>
      <button class="bet-slip-icon"><span class="bet-count" id="bet-slip-count">0</span></button>
      
      <!-- Success Modal -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Bet Placed Successfully!</h2>
        <p>Your bet code is <strong id="betCodeDisplay"></strong>.</p>
        <button id="copyBetCodeBtn">Copy Bet Code</button>
        <button id="closeModalBtn">Close</button>
    </div>
</div>

<a href="history.html">View Bet History (<span id="placedBetCount">0</span>)</a>


            <!-- Pass the balance to JavaScript -->
            <?php if (isset($_SESSION['balance'])): ?>
            <script>
                let currentBalance = parseFloat("<?php echo number_format((float)$_SESSION['balance'], 2, '.', ''); ?>");
                console.log("Current Balance:", currentBalance);
            </script>
        <?php else: ?>
            <script>
                let currentBalance = NaN;
                console.log("Balance is not set or could not be retrieved.");
            </script>
            <?php endif; ?>
  
  
    <script src="./details/ID001.js"></script>
    <script src="./bet.js"></script>
    <script src="./slip.js"></script>
    <script src="./options/script.js"></script>
    <script src="/details/ID001.js"></script>
     <script src="./history.js"></script>


     

<script>
    
// Function to fetch updated scores and match status for all matches
function fetchMatchUpdates() {
    fetch('fetch_scores.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(match => {
                const matchElement = document.querySelector(`[data-match-id="${match.match_id}"]`);
                if (matchElement) {
                    const scoreElement = matchElement.querySelector(`#score-${match.match_id}`);
                    const timeElement = matchElement.querySelector(`#time-${match.match_id}`);

                    if (match.match_status === "live") {
                        scoreElement.textContent = `${match.home_score}-${match.away_score}`;
                        scoreElement.style.transition = 'opacity 0.5s';
                        scoreElement.style.opacity = 0;
                        setTimeout(() => {
                            scoreElement.style.opacity = 1;
                        }, 500);

                        const matchStartTime = new Date(match.match_start_time);
                        const currentTime = new Date();
                        let elapsedMinutes = Math.floor((currentTime - matchStartTime) / 60000);

                        let displayTime;
                        if (elapsedMinutes < 45) {
                            displayTime = `${elapsedMinutes}:00 H1`;
                        } else if (elapsedMinutes < 60) {
                            displayTime = "45:00 HT";
                        } else {
                            displayTime = `${elapsedMinutes - 15}:00 H2`;
                        }

                        timeElement.innerHTML = `<span>${displayTime}</span>`;
                        scoreElement.style.display = 'flex';
                        timeElement.style.display = 'block';
                    } else {
                        scoreElement.style.display = 'none';
                        timeElement.style.display = 'none';
                    }
                } else {
                    console.warn(`No container found for match_id: ${match.match_id}`);
                }
            });
        })
        .catch(error => {
            console.error('Error fetching scores:', error);
        });
}

// Refresh match updates every 10 seconds
setInterval(fetchMatchUpdates, 10000);

// Fetch match updates when the page loads
fetchMatchUpdates();


function loadLiveMatches() {
        fetch('fetch_live_matches.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const liveMatchesContainer = document.querySelector('.image-list');
                liveMatchesContainer.innerHTML = '';  // Clear previous matches

                data.matches.forEach(match => {
                    liveMatchesContainer.innerHTML += `
                        <div class="image-item">
                            <a href="#"><h4>${match.home_team} vs ${match.away_team}</h4></a>
                        </div>
                    `;
                });
            } else {
                console.log(data.message);  // Log if no matches are found
            }
        })
        .catch(error => console.error('Error fetching live matches:', error));
    }

    // Load live matches every 5 seconds
    setInterval(loadLiveMatches, 5000);
    loadLiveMatches(); // Initial load



    // Load the bet count from localStorage and update the link
    document.addEventListener('DOMContentLoaded', () => {
function updatePlacedBetCount() {
    let placedBetCount = JSON.parse(localStorage.getItem('placedBetCount')) || 0;
    placedBetCount++;
    localStorage.setItem('placedBetCount', placedBetCount);
    document.getElementById('placedBetCount').innerText = placedBetCount;
}

// Call this function every time a bet is placed and added to history
updatePlacedBetCount();

});

</script>

