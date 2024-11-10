
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/home.css">
</head>
<body>

    <header>
        
            <span>GameCraft</span>
            <a href="">Home</a>
            <a href="store.php">Store</a>
            <a href="">Library</a>
            <a href="">Cart</a>
            <div class="btns">
                <button class="l-btn">Login</button>
                <button class="s-btn">Sign up</button>
            </div>
        
    </header>


<!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="./Images/Alan wake 2 1080p.jpg">
                <div class="content">
                    <div class="author">TEST</div>
                    <div class="title">DESIGN TEST</div>
                    <div class="topic">TEST NAME</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>TEST BUTTON</button>
                        <button>TEST BUTTON</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/Farcry 6 1080p.jpg">
                <div class="content">
                    <div class="author">TEST</div>
                    <div class="title">DESIGN TEST</div>
                    <div class="topic">TEST NAME</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>TEST BUTTON</button>
                        <button>TEST BUTTON</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/god of war 1080p.jpg">
                <div class="content">
                    <div class="author">TEST</div>
                    <div class="title">DESIGN TEST</div>
                    <div class="topic">TEST NAME</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>TEST BUTTON</button>
                        <button>TEST BUTTON</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/last of us 1080p.jpg">
                <div class="content">
                    <div class="author">TEST</div>
                    <div class="title">DESIGN TEST</div>
                    <div class="topic">TEST NAME</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>TEST BUTTON</button>
                        <button>TEST BUTTON</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="./Images/Alan wake 2 1080p.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/Farcry 6 1080p.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/god of war 1080p.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="./Images/last of us 1080p.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>
    

    <script src="./JS/home.js"></script>

    <?php
    include_once 'footer.php';
    ?>
</body>
</html>