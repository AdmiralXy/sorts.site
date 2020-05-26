<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdmiralSort2</title>
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
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="/">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/compare">Сравнить алгоритмы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/complexity">Таблица сложности</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="text-center">Алгоритмы сортировки</h1>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <button type="button" class="btn btn-elegant ml-0 reset" disabled><i class="fas fa-redo-alt pr-2"></i>RESET</button>

                <button type="button" class="btn btn-primary ml-0" data-toggle="modal" data-target="#centralModal">
                    Информация по использованию
                </button>

            </div>
            <div class="graph d-flex flex-nowrap align-items-end mb-3" style="width: 100%; max-width: 1140px; margin: 0px 5px 0px 5px;"></div>

            <div class="col-md-6">
                <form>
                    <div class="information pr-5">
                        <select name="graphspeed" class="mdb-select md-form md-outline colorful-select dropdown-primary mt-1">
                            <option value="1" selected>Автоматическая скорость</option>
                            <option value="0.5">Быстрее в 2 раза</option>
                            <option value="0.25">Быстрее в 4 раза</option>
                            <option value="2">Медленнее в 2 раза</option>
                            <option value="4">Медленнее в 4 раза</option>
                        </select>
                        <p class="text-danger small">Визуальное отображение для массивов длинной от 2 до 205 элементов.</p>

                        <p>
                            <select name="algorithm" class="mdb-select md-form md-outline colorful-select dropdown-primary mt-1">
                                <option value="" disabled selected>Выберите алгоритм</option>
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
                            </select>
                            <select name="datatype" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                <option value="" disabled selected>Вводимые данные</option>
                                <option value="custom">Ввести свой массив</option>
                                <option value="ints">Сгенерировать массив чисел</option>
                                <option value="floats">Сгенерировать массив чисел с плавающей запятой</option>
                                <option value="strings">Сгенерировать массив строк</option>
                                <option value="dates">Сгенерировать массив дат</option>
                            </select>
                            <div class="generator">
                                <select name="generator" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                    <option value="" disabled selected>Генерация</option>
                                    <option value="random">Случайный</option>
                                    <option value="halfsorted">Частично-упорядоченный</option>
                                    <option value="halfsame">Частично-одинаковые элементы</option>
                                </select>
                            </div>
                            <div class="length">
                                <select name="length" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                    <option value="" disabled selected>Количество элементов</option>
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="1000">1.000</option>
                                    <option value="10000">10.000</option>
                                    <option value="100000">100.000</option>
                                    <option value="1000000">1.000.000</option>
                                    <option value="2000000">2.000.000</option>
                                </select>
                                <div class="md-form key">
                                    <input type="text" id="key" class="form-control" name="key">
                                    <label for="key">Введите ключ для генератора</label>
                                    <p class="text-muted small">Или оставьте пустым для случайного значения</p>
                                </div>
                            </div>

                            <div class="md-form array">
                                <input type="text" id="array" class="form-control" name="array">
                                <label for="array">Введите данные</label>
                                <p class="text-muted small">Пример: 1 2 3 4 5 6</p>
                                <p class="text-muted small">Формат ввода даты: 1733-06-31</p>
                            </div>
                            <button id="start" type="submit" class="btn btn-indigo ml-0">Отправить данные <i class="fas fa-sort ml-1"></i></button>
                            <div class="loader d-flex align-items-center my-4">
                                <div class="spinner-border text-primary" role="status"></div>
                                <div class="ml-3">Ожидание ответа...</div>
                            </div>
                        </p>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="results pt-1">
                    <p>Результаты:</p>
                    <p>
                        Алгоритм: <span class="algo">~</span> <br>
                        Тип данных массива: <span class="arraytype">~</span> <br>
                        Генерация: <span class="generate">~</span> <br>
                        Ключ: <span class="keygen">~</span> <br>
                        Размер массива: <span class="count">~</span> эл. <br>
                        Затраченное время: <span class="timer">~</span>ms <br>
                    </p>
                </div>
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
                        Для начала следует выбрать алгоритм для проверки. <br>
                        Если выбран вариант "Ввести свой массив", можно ввести элементы в поле ниже, элементы должны разделяться пробелом. <br>
                        Если выбран вариант с генерацией, необходимо так же выбрать параметры "Генерация" и "Количество элементов". <br>
                        Формат для корректного ввода дат: "гггг-мм-дд" или "гггг.мм.дд". <br>
                    </p>
                    <p>Поле для ввода ключа генерации:</p>
                    <p class="small">
                        Если необходимо, можно сгенерировать конкретный "случайный" массив по ключу. <br>
                        К примеру ключ "kpfu", будет каждый раз генерировать конкретный "случайный" массив чисел, дат или строк. <br>
                        Если данный параметр оставить пустым, сгенерируется случайный ключ.
                    </p>
                    <p>Завершение:</p>
                    <p class="small">
                        После окончания алгоритма сортировки, должна появиться надпись в правом углу "Успешно!". <br>
                        И если ваш массив небольшой, начнётся отображение алгоритма в чёрном поле.
                    </p>
                    <p>Замечания:</p>
                    <p class="small">
                        Визуальное отображение в чёрном окне работает для массивов длинной от 2 до 205 элементов. <br>
                        Это связано с тем, что программа работает на таймерах JavaScript, и на большинстве браузеров он ограничен 4 мс минимально.
                        То есть большие массивы будут отображаться слишком долго. <br>
                        Для сортировки слиянием, порязрядной сортировки и встроенной сортировки, визуальное отображение не предусмотрено. <br>
                        Автоматическая скорость вычисляется автоматически исходя из длины массива. <br>
                        Кнопка "Reset" предназначена, в случае сбоя в системе для перезагрузки, или же для преждевременной остановки визуального отображения, и продолжения работы без перезагрузки страницы.
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
    <!-- Custom -->
    <script type="text/javascript" src="js/admiralgraph.js"></script>

    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
            $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function() {
                $(this).closest('.select-outline').find('label').toggleClass('active');
                $(this).closest('.select-outline').find('.caret').toggleClass('active');
            });
        });
    </script>

    <script>
        $(document).ajaxStop(function() {
            $('.loader').attr('style', 'display:none !important');
        });
        var swapTimer;
        $(document).ready(function() {
            $(".length").hide();
            $(".generator").hide();
            $(".array").hide();
            $('.loader').attr('style', 'display:none !important');
        });
        $(".reset").click(function() {
            clearInterval(swapTimer);
            $(".reset").prop("disabled", true);
            $("#start").prop("disabled", false);
            $(".graph").empty();
        });
        $.fn.swap = function(elem) {
            elem = elem.jquery ? elem : $(elem);
            return this.each(function() {
                $(document.createTextNode('')).insertBefore(this).before(elem.before(this)).remove();
            });
        };

        $("form").on("submit", function() {

            $('.loader').attr('style', 'display:flex !important');

            $.ajax({
                type: "POST",
                url: 'includes/sortingpage.php',
                data: $(this).serialize(),
                success: function(data) {
                    let answer = data.split(' ');
                    $('.algo').text(answer[1]);
                    $('.arraytype').text(answer[2]);
                    $('.generate').text(answer[3]);
                    $('.keygen').text(answer[4]);
                    $('.count').text(answer[5]);
                    if (answer[6] == 0)
                        $('.timer').text('<0.1');
                    else
                        $('.timer').text(answer[6]);

                    $(".graph").empty();

                    if (answer[8]) {
                        var array = [];
                        for ($i = 8; $i < 8 + Number(answer[5]); $i++)
                            array.push(answer[$i]);
                        $max = Math.max.apply(Math, array);
                        $.each(array, function(index, value) {
                            $height = ((array[index] / $max) * 100);
                            $(".graph").append('<div class="item" style="height:' + $height + '%"></div>');
                        });
                    }

                    function speedCalculate($length) {
                        $speed = 30;
                        $defaultlength = 200;
                        $temp = 100 - ($length / $defaultlength);
                        if ($temp < 0)
                            $temp *= -1;
                        return $speed * (1 + ($temp / 100));
                    }

                    if (answer[8] && answer[1] != 'Поразрядная-сортировка' && answer[1] != 'Сортировка-слиянием' && answer[1] != 'Встроенная-сортировка') {
                        $i = 8 + Number(answer[5]);

                        function swap() {
                            if (answer[$i] != answer[$i + 1]) {
                                $('.item').eq(answer[$i]).css('background-color', 'red');
                                $('.item').eq(answer[$i + 1]).css('background-color', 'green');
                                $($(".item").eq(answer[$i])).swap($(".item").eq(answer[$i + 1]));
                            }
                            $i = $i + 2;
                            if ($i > answer.length) {
                                clearInterval(swapTimer);
                                $("#start").prop("disabled", false);
                            }
                        }
                        swapTimer = setInterval(swap, speedCalculate(array.length) * $("select[name='graphspeed']").val());
                        $("#start").prop("disabled", true);
                        $(".reset").prop("disabled", false);
                    } else if ((answer[8] && answer[1] == 'Поразрядная-сортировка') || (answer[8] && answer[1] == 'Сортировка-слиянием')) {
                        var i = 8 + Number(answer[5]);
                        var arrayToScreen = [];

                        function swap() {
                            $(".graph").empty();
                            arrayToScreen = [];
                            for ($j = i; $j < i + Number(answer[5]); $j++)
                                arrayToScreen.push(answer[$j]);
                            $max = Math.max.apply(Math, arrayToScreen);
                            $.each(arrayToScreen, function(index, value) {
                                $height = ((arrayToScreen[index] / $max) * 100);
                                $(".graph").append('<div class="item" style="height:' + $height + '%"></div>');
                            });
                            i = i + Number(answer[5]);
                            if (i + Number(answer[5]) > answer.length) {
                                clearInterval(swapTimer);
                                $("#start").prop("disabled", false);
                            }
                        }

                        swapTimer = setInterval(swap, 1000 * $("select[name='graphspeed']").val());
                        $("#start").prop("disabled", true);
                        $(".reset").prop("disabled", false);
                    }

                    switch (data) {
                        case 'error_algorithm':
                            toastr.warning('Выберите алгоритм!');
                            break;
                        case 'error_datatype':
                            toastr.warning('Выберите тип данных!');
                            break;
                        case 'error_customempty':
                            toastr.warning('Ваш массив пуст!');
                            break;
                        case 'error_length':
                            toastr.warning('Выберите количество элементов!');
                            break;
                        case 'error_generator':
                            toastr.warning('Выберите тип генерации!');
                            break;
                        default:
                            toastr.success('Успешно!');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
            return false;
        });
    </script>

</body>

</html>