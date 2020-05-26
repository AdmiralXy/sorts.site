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
    <link href="css/addons/datatables.min.css" rel="stylesheet">
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
                    <a class="nav-link waves-effect waves-light" href="/">Главная</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="/compare">Сравнить алгоритмы <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/complexity">Таблица сложности</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container py-5">
        <h1 class="text-center">Сравнение алгоритмов</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-sm small btn-primary ml-0" data-toggle="modal" data-target="#centralModal">
                    Информация по использованию
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <select name="algorithm" class="mdb-select md-form colorful-select dropdown-primary" multiple>
                        <option value="" disabled selected>Выберите алгоритмы</option>
                        <option value="bubblesort">Сортировка пузырьком [Bubblesort]</option>
                        <option value="cocktailsort">Шейкерная сортировка [Cocktailsort]</option>
                        <option value="selectionsort">Сортировка выбором [Selectionsort]</option>
                        <option value="shellsort">Сортировка Шелла [Shellsort]</option>
                        <option value="combsort">Сортировка расчесткой [Combsort]</option>
                        <option value="quicksort">Быстрая сортировка [Quicksort]</option>
                        <option value="mergesort">Сортировка слиянием [Mergesort]</option>
                        <option value="heapsort">Сортировка кучей [Heapsort]</option>
                        <option value="radixsort">Поразрядная сортировка [Radixsort]</option>
                        <option value="phpsort">Встроенная PHP 7: sort()</option>
                        <option value="quicksortIterative">Быстрая сортировка без рекурсии</option>
                        <option value="mergesortIterative">Сортировка слиянием без рекурсии</option>
                        <option value="introsort">Интроспективная сортировка [Introsort]</option>
                    </select>
                    <label class="mdb-main-label">Выберите алгоритмы</label>
                    <select name="datatype" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                        <option value="" disabled selected>Вводимые данные</option>
                        <option value="ints">Массивы чисел</option>
                        <option value="floats">Массивы чисел с плавающей запятой</option>
                        <option value="strings">Массивы строк</option>
                        <option value="dates">Массивы дат</option>
                    </select>
                    <div class="generator">
                        <select name="generator" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Генерация</option>
                            <option value="random">Случайный</option>
                            <option value="halfsorted">Частично-упорядоченный</option>
                            <option value="halfsame">Частично-одинаковые элементы</option>
                        </select>
                    </div>
                    <div class="return">
                        <select name="return" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Вычисляемый параметр</option>
                            <option value="timer">Время работы [ms]</option>
                            <option value="swaps">Количество обменов [swaps]</option>
                            <option value="memory">Потребляемая память [kb]</option>
                        </select>
                    </div>
                    <div class="repeatedly">
                        <select name="repeatedly" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="1" selected>Расчитать среднее для 1 запуска</option>
                            <option value="3">Расчитать среднее для 3 запусков</option>
                            <option value="5">Расчитать среднее для 5 запусков</option>
                            <option value="10">Расчитать среднее для 10 запусков</option>
                        </select>
                    </div>
                    <div class="module">
                        <select name="module" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Модуль чисел меньше или равен</option>
                            <option value="9">9</option>
                            <option value="99">100</option>
                            <option value="999">1000</option>
                            <option value="99999">100000</option>
                            <option value="999999">1000000</option>
                        </select>
                    </div>
                    <button id="start" type="submit" class="btn btn-primary ml-0 mb-5">Начать вычисление</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="loader d-flex align-items-center mb-4">
                    <div class="spinner-border text-primary" role="status"></div>
                    <div class="ml-3">Выполняются вычисления...</div>
                </div>
                <p class="text-primary">Настройки графика:</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form mt-0">
                            <input name="chartwidth" type="text" id="form2" class="form-control">
                            <label for="form2">Ширина</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form mt-0">
                            <input name="chartheight" type="text" id="form3" class="form-control">
                            <label for="form3">Высота</label>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-12">
                <div class="myChartDiv">
                    <canvas id="lineChart" width="11600" height="11400"></canvas>
                </div>
            </div>

            <div class="col-md-12 py-5">
                <div class="myChartDiv">
                    <canvas id="barChart" width="11600" height="11400"></canvas>
                </div>

            </div>

            <div class="col-md-12 py-5">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Алгоритм

                            </th>
                            <th class="th-sm">Размер массива

                            </th>
                            <th class="th-sm">Итерации

                            </th>
                            <th class="th-sm">Ср. значение

                            </th>
                        </tr>
                    </thead>
                    <tbody id="tabledata">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Инструкция</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Начало работы:</p>
                    <p class="small">
                        Для начала следует выбрать алгоритм или множество алгоритмов для проверки. Далее параметры:<br>
                        "Вводимые данные", тип переменных в массиве. <br>
                        "Генерация", метод генерации элементов. <br>
                        "Вычисляемый параметр", необходимое возвращаемое значение. <br>
                        "Рассчитать среднее", сколько раз следует обрабатывать один и тот же алгоритм, на каждой размерности массива, к примеру если выбрано "5", на каждой размерности, алгоритм будет прогоняться 5 раз, и итоговый результат будет выдан в качестве среднего значения среди всех итераций. Значение каждой итерации можно так же посмотреть в таблице. <br>
                    </p>
                    <p>Процесс:</p>
                    <p class="small">
                        После начала работы, появиться надпись "Выполняются вычисления...", после завершения всех процессов надпись пропадёт.<br>
                        Ограничение по времени работы алгоритма - 200 секунд, если алгоритм не успевает уложиться в данный промежуток времени, он завершается и на больших размерах массива запускаться он не будет.
                    </p>
                    <p>Графики:</p>
                    <p class="small">
                        По вертикальной оси - значение вычисляемого параметра, по горизонтальной - размерность массива. <br>
                        Если необходимо, можно указать размеры для графиков в пикселях, в полях "Ширина" и "Высота", расположенном над первым графиком.
                    </p>
                    <p>Таблица:</p>
                    <p class="small">
                        Если необходимо посмотреть полную информацию об итерациях, или времени конкретного алгоритма на каждой размерности в числах. Можно обратиться к таблице, в которой так же присуствует поиск.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small primary-color-dark mt-5">

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
    <script type="text/javascript" src="js/addons/datatables.min.js"></script>

    <script>
        //LINECHART
        var ctxL;
        var LineChart;
        var ctxB;
        var BarChart;
        var lineChartOptions = {
            tooltips: {
                mode: 'x',
                intersect: false
            },
            scales: {
                yAxes: [{
                    type: 'logarithmic',
                    gridLines: {

                    },
                    ticks: {
                        callback: function(label, index, labels) {
                            return label;
                        },
                        suggestedMin: 0,
                        suggestedMax: 60000
                    }
                }],
                xAxes: [{
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 2000000
                    }
                }]
            },
            responsive: true,
            lineTension: 0,
            steppedLine: true
        };
        var lineChartLabels = {
            labels: ["10", "100", "200", "1.000", "10.000", "100.000", "1.000.000", "2.000.000"]
        };

        //BARCHART
        var barChartLabels = {
            labels: ["10", "100", "200", "1.000", "10.000", "100.000", "1.000.000", "2.000.000"]
        };

        var barChartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            title: {
                display: true,
                text: "Альтернативная визуализация"
            },
            scales: {
                yAxes: [{
                    type: 'logarithmic',
                    ticks: {
                        beginAtZero: true,
                        callback: function(label, index, labels) {
                            return label;
                        },
                        suggestedMin: 0,
                        suggestedMax: 60000
                    }
                }]
            }
        }
    </script>

    <script>
        window.onload = function() {
            //lineChart
            ctxL = document.getElementById("lineChart").getContext('2d');
            LineChart = new Chart(ctxL, {
                type: 'line',
                data: lineChartLabels,
                lineTension: 0,
                options: lineChartOptions
            });
            //barChart
            ctxB = document.getElementById("barChart").getContext("2d");
            BarChart = new Chart(ctxB, {
                type: "bar",
                data: barChartLabels,
                options: barChartOptions
            });
        };
    </script>

    <script>
        function InitLineChart($labels) {
            var colors = ['#BF6464', '#000', '#95b8d1', '#e8ddb5', '#3868b8', '#7a3b82', '#ff0059', '#ffaaff', '#fc7f43', '#00a440', '#02f517', '#f5f502', '#03fce3'];
            let i = 0;
            $.each($labels, function(key, value) {
                var color = colors[i++];
                var newDataset = {
                    label: value,
                    fill: true,
                    data: [],
                    borderColor: color,
                    backgroundColor: [
                        'rgba(0, 0, 0, .0)'
                    ],
                    borderWidth: 6
                };
                LineChart.data.datasets.push(newDataset);
                window.LineChart.update();
            });
        }

        function InitBarChart($labels) {
            var colors = ['#BF6464', '#000', '#95b8d1', '#e8ddb5', '#3868b8', '#7a3b82', '#ff0059', '#ffaaff', '#fc7f43', '#00a440', '#02f517', '#f5f502', '#03fce3'];
            let i = 0;
            $.each($labels, function(key, value) {
                var color = colors[i++];
                var newDataset = {
                    label: value,
                    borderColor: color,
                    backgroundColor: color,
                    borderWidth: 1,
                    data: []
                };
                BarChart.data.datasets.push(newDataset);
                window.BarChart.update();
            });
        }

        function LineChartPush(dataset, data, value) {
            LineChart.data.datasets[dataset].data[data] = value;
            window.LineChart.update();
        }

        function BarChartPush(dataset, data, value) {
            BarChart.data.datasets[dataset].data[data] = value;
            window.BarChart.update();
        }
    </script>

    <script>
        $("form").on("submit", function() {
            LineChart.data.datasets = [];
            BarChart.data.datasets = [];
            LineChart.update();
            BarChart.update();
            clearTable();
            var algorithms = $("select[name='algorithm']").val() + '';
            $datatype = $("select[name='datatype']").val();
            $generator = $("select[name='generator']").val();
            $return = $("select[name='return']").val();
            $repeatedly = $("select[name='repeatedly']").val();
            $module = $("select[name='module']").val();
            var algorithm = algorithms.split(',');
            var sizes = ["10", "100", "200", "1000", "10000", "100000", "1000000", "2000000"];
            if (algorithms === "" || $datatype === "" || $generator === "" || $return === "" || $repeatedly === "" || $module === "") {
                toastr.warning('Заполните все поля!');
            } else {
                InitLineChart(algorithm);
                InitBarChart(algorithm);
                ajaxGo(algorithm, $datatype, $generator, $return, sizes, $repeatedly, $module, 0, 0);
            }
            return false;
        });

        var algorithmStop = [];

        function ajaxGo(algorithm, $datatype, $gen, $return, sizes, $repeatedly, $module, $i, $j) {
            $('.loader').attr('style', 'display:flex !important');
            $.ajax({
                type: "POST",
                url: 'includes/sortinganalysis?algorithm=' + algorithm[$i] +
                    '&datatype=' + $datatype +
                    '&generator=' + $gen +
                    '&return=' + $return +
                    '&length=' + sizes[$j] +
                    '&repeatedly=' + $repeatedly +
                    '&module=' + $module,
                data: $(this).serialize(),
                success: function(data) {
                    $("#start").prop("disabled", true);
                    let answer = data.split(' ');
                    let iterationsNumber = answer[3];
                    let result = 0;
                    let iterations = [];

                    for (let i = 0; i < iterationsNumber; i++) {
                        result += Number(answer[4 + i]);
                        iterations.push(answer[4 + i]);
                    }

                    result /= iterationsNumber;
                    result = result.toFixed(1);

                    if (answer[0] == 'success') {
                        LineChartPush($i, $j, result);
                        if (String(result) == '0.0')
                            BarChartPush($i, $j, 0.03);
                        else
                            BarChartPush($i, $j, result);
                        if (String(result) == '0.0')
                            result = '< 0.01'
                        else
                            result = result;
                        insertData(answer[1], sizes[$j], iterations, result);
                    } else {
                        toastr.warning('Превышено время ожидания!');
                        algorithmStop.push(algorithm[$i]);
                    }

                    $i++;


                    if (algorithm.length == $i) {
                        $i = 0;
                        $j++;
                    }
                    while (algorithmStop.indexOf(algorithm[$i]) != -1) {
                        $i++;
                        if (algorithm.length == $i) {
                            $i = 0;
                            $j++;
                        }

                    }
                    if (sizes.length != $j)
                        ajaxGo(algorithm, $datatype, $generator, $return, sizes, $repeatedly, $module, $i, $j);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    </script>

    <script>
        $(document).ajaxStop(function() {
            $('.loader').attr('style', 'display:none !important');
            $("#start").prop("disabled", false);
        });
    </script>
    <script>
        var table;
        $(document).ready(function() {
            table = $('#dtBasicExample').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
            $('.mdb-select').materialSelect();
            $('.loader').attr('style', 'display:none !important');
        });
    </script>
    <script>
        $("input[name='chartwidth']").change(function() {
            $(".myChartDiv").width($("input[name='chartwidth']").val());
            $(".myChartDiv").height($("input[name='chartheight']").val());
            $("#lineChart").width($("input[name='chartwidth']").val());
            $("#lineChart").height($("input[name='chartheight']").val());
            $("#barChart").width($("input[name='chartwidth']").val());
            $("#barChart").height($("input[name='chartheight']").val());
        });
        $("input[name='chartheight']").change(function() {
            $(".myChartDiv").width($("input[name='chartwidth']").val());
            $(".myChartDiv").height($("input[name='chartheight']").val());
            $("#lineChart").width($("input[name='chartwidth']").val());
            $("#lineChart").height($("input[name='chartheight']").val());
            $("#barChart").width($("input[name='chartwidth']").val());
            $("#barChart").height($("input[name='chartheight']").val());
        });
    </script>
    <script>
        function clearTable() {
            table.rows().remove().draw();
        }

        function insertData(alg, len, iterations, result) {
            let iter = '';
            $.each(iterations, function(index, value) {
                iter += value + '; ';
            });
            //let data = "<tr role='row' class='odd'><td>" + alg + "</td><td>" + len + "</td><td>" + iter + "</td><td>" + result + "</td></tr>";
            //$("#tabledata").append(data);
            table.row.add([
                alg,
                len,
                iter,
                result
            ]).draw(false);
        }
    </script>

</body>

</html>