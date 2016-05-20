<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - UALink</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src =
                "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=133331550020554";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <nav class="navbar navbar-default bg-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">UALink</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-color">
                    <li><a href="#">HOME</a>
                    </li>
                    <li><a href="#">ABOUT</a>
                    </li>
                    <li><a href="#">FAQS</a>
                    </li>
                    <li><a href="#">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/carousel/carousel01.png" alt="Image">
                                <div class="carousel-caption">
                                    <h4>Student Portal</h4>
                                    <p>Student Information System</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="images/carousel/carousel02.png" alt="Image">
                                <div class="carousel-caption">
                                    <h4>Student Portal</h4>
                                    <p>Student Information System</p>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">NEWS AND UPDATES</div>
                            <div class="panel-body">

                                <ul class="list-group">
                                    <li class="list-group-item"><span class="badge">May 17, 2016</span> update
                                    </li>
                                    <li class="list-group-item"><span class="badge">May 17, 2016</span> update 2
                                    </li>
                                    <li class="list-group-item"><span class="badge">May 17, 2016</span> update 3
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="well">


                    <form class="form-horizontal" role="form">
                        <div class="panel-heading">
                            <p align="left">LOGIN ACCOUNT</p>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-12 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="studentID" placeholder="Student Number (e.g., 2014-0001-A)">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-12 input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <input type="password" class="form-control" id="passwd" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">HOW TO LOGIN</div>
                    <div class="panel-body">
                        <ol type="1" class="list-group">
                            <li class="list-group-item list-num">Enter your Student ID Number (e.g. 2015-1002-A)</li>
                            <li class="list-group-item list-num">Enter your password</li>
                            <li class="list-group-item list-num">Click the "Login" button.</li>
                            <li class="list-group-item list-num">For new users, please see MIS office for your password.
                            </li>
                        </ol>


                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">LIKE US ON FACEBOOK</div>
                    <div class="panel-body">
                        <div class="fb-page" data-href="https://www.facebook.com/universityofantique/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/universityofantique/">
                                    <a href="https://www.facebook.com/universityofantique/">University of Antique</a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </div>

    </div>

    <br>
    <footer class="container-fluid text-center">
        <p>Web Application Developed by Gerard James B. Pagliganyen</p>
        <p>MIS Office, University of Antique</p>
    </footer>
</body>

</html>