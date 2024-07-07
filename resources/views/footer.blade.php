<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free ads</title>
</head>

<body>
    <style>
        body {
            margin-top: 20px;
        }

        .footer {
            background: #232a34;
            padding-bottom: 20px;
            padding-top: 30px;
        }

        .footer_menu {
            margin-bottom: 20px;
        }

        .footer_menu ul {
            list-style: none;
            text-align: center;
        }

        .footer_menu ul li {
            display: inline-block;
        }

        .footer_menu ul li a {
            color: #fff;
            padding: 0 10px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .footer_menu ul li a:hover {
            color: #554c86;
        }

        /*START FOOTER SOCIAL DESIGN*/
        .footer_profile {
            margin-bottom: 40px;
        }

        .footer_profile ul {
            list-style: outside none none;
            margin: 0;
            padding: 0
        }

        .footer_profile ul li {
            display: inline-block;
        }

        @media only screen and (max-width:480px) {
            .footer_profile ul li {
                margin: 2px;
            }
        }

        .footer_profile ul li a img {
            width: 60px;
        }


        .footer_profile ul li a {
            background: #554c86;
            width: 40px;
            height: 40px;
            display: block;
            text-align: center;
            margin-right: 5px;
            border-radius: 50%;
            line-height: 40px;
            box-sizing: border-box;
            text-decoration: none;
            -webkit-transition: .3s;
            transition: .3s;
            color: #fff;
        }

        .footer_copyright {
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 12px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: #fff;
        }
    </style>
    <footer>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <div class="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a class="nav-link" href="{{route('posts.index')}}">My ads list</a>
                                </li>
                                <li><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                                <li><a class="nav-link" href="{{route('posts.create')}}">Create new ad</a></li>

                            </ul>
                        </div>
                        <div class="footer_copyright">
                            <p>© 2024 Sai. All Rights Reserved.</p>
                        </div>
                        <div class="footer_profile">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </div>
    </footer>
</body>

</html>
