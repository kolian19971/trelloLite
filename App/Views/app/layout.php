
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo isset($data['title']) ? $data['title'] : ''; ?></title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles-->
    <link href="/public/frontend/css/style.css" rel="stylesheet">
</head>

<body>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Главная</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">

                <?php if(!isset($data['admin'])){ ?>

                    <li class="nav-item">
                        <a class="nav-link authModal" href="#">Авторизация</a>
                    </li>

                <?php }else{ ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $data['admin']->login; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/home/logout">Выход</a>
                        </div>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </div>
</nav>

<main role="main" class="container">

    <?php
        if(isset($view))
            include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/'.$view;
    ?>

</main><!-- /.container -->

<!-- Auth Modal -->
<div class="modal fade" id="authModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Авторизация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="authForm" method="post" action="/home/auth">
                    <div class="form-group">
                        <label for="login" class="col-form-label">Логин:</label>
                        <input required type="text" class="form-control" id="login" name="login">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Пароль:</label>
                        <input required type="password" class="form-control" id="password" name="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" form="authForm" class="btn btn-primary" value="Войти">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--Layout js-->
<script src="/public/frontend/js/layout.js"></script>

</body>
</html>
