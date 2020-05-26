$("select[name='datatype']").change(function () {
    if ($(this).val() == 'custom') {
        $(".array").show();
        $(".generator").hide();
        $(".length").hide();
    }
    else {
        $(".generator").show();
        if ($("select[name='generator']").val() != "Генерация") {
            $(".length").show();
        }
        $(".array").hide();
    }
});

$("select[name='generator']").change(function () {
    $(".length").show();
});