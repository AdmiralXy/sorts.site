<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdmiralSort</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark primary-color-dark">
        <a class="navbar-brand" href="/">AdmiralSort</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/compare">Сравнить алгоритмы</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="/complexity">Таблица сложности <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center">Таблица сложности</h1>

        <table class="table my-5 table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="primary-color white-text">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Алгоритм</th>
                    <th scope="col">Лучшее время</th>
                    <th scope="col">Среднее время</th>
                    <th scope="col">Худшее время</th>
                    <th scope="col">Доп. память (макс)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Сортировка пузырьком</td>
                    <td>O(n)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <<td>O(1)</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Шейкерная сортировка</td>
                    <td>O(n)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(1)</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Сортировка выбором</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(1)</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Сортировка Шелла</td>
                    <td>O(n log<sup>2</sup>(n))</td>
                    <td>Зависит от выбранных шагов</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n) + O(1)</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Сортировка расческой</td>
                    <td>O(n log(n))</td>
                    <td>O(n<sup>2</sup>/2<sup>n</sup>)</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(1)</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Быстрая сортировка</td>
                    <td>O(n log(n))</td>
                    <td>O(n log(n))</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n)</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Сортировка слиянием</td>
                    <td>O(n log(n))</td>
                    <td>O(n log(n))</td>
                    <td>O(n log(n))</td>
                    <td>O(n)</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Сортировка кучей</td>
                    <td>O(n log(n))</td>
                    <td>O(n log(n))</td>>
                    <td>O(n log(n))</td>
                    <td>O(1)</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Поразрядная сортировка</td>
                    <td>O(nk)</td>
                    <td>O(nk)</td>
                    <td>O(nk)</td>
                    <td>O(n + k)</td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Встроенная в язык PHP сортировка</td>
                    <td>O(n log(n))</td>
                    <td>O(n log(n))</td>
                    <td>O(n<sup>2</sup>)</td>
                    <td>O(n)</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="container">
        <div class="row">

        </div>
    </div>


    <!-- Footer -->
    <footer class="page-footer font-small primary-color-dark mt-5 fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© Макин Данил 09-831:
            <a target="_blank" href="https://kpfu.ru/"> kpfu.ru</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>