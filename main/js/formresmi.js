function aprint() {
    $(".dataTables_length ").hide();
    $("#example_paginate").hide();
    $("#example_info").hide();
    $(".dataTables_filter ").hide();
    $("#" + "example" + " input:checkbox").hide();
    $('.btn-group').hide();
    window.print();
    $("#example_info").show();
    $("#example_paginate ").show();
    $(".dataTables_filter ").show();
    $(".dataTables_length ").show();
    $('.btn-group').show();
    $("#" + "example" + " input:checkbox").show();
}


function deleteRow() {
    $('input[name="cek[]"]:checked').each(function () {
//                    alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this
        $.ajax({
            type: "GET",
            url: "delete.php",
            data: "id=" + this.value
        });

    });
    location.reload();
}
function save() {
    $('input[name="cek[]"]:checked').each(function () {
        alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this

        $.ajax({
            type: "post",
            url: "inserttable.php",
            data: $('#formtable').serialize(),
        });


        console.log(this);

    });
}

$('html').keyup(function (e) {
    if (e.keyCode == 46) {

        deleteRow();

    }
});
function del() {
    $('input[class="cek"]:checked').each(function () {
//                        alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this
        $.ajax({
            type: "GET",
            url: "delete.php",
            data: "id=" + this.value
        });

    });
    location.reload();
}

$(document).ready(function () {
    var datadel = [];
    var rows_selected = [];
    var countdel = 0
    var countsave = 0;
    $('#example tr').click(function (event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });

    $('#example').DataTable({
    });
    var t = $('#example').DataTable();


    $('#addRow').on('click', function () {
        t.row.add([
            "<tr><th><input type='checkbox' name='cek[]' checked disabled='disabled' /></th>",
            "<th ><input type='text' placeholder='masukan value' style='width:60px;' name='kelas[]'></th>",
            " <td ><input type='text' placeholder='masukan value'style='width:260px;'  name='senin[]'><ul><li><input type='text' placeholder='masukan value'style='width:100%;' name='detail[]'></li></ul></td>",
            "<td ><input type='text' placeholder='masukan value'style='width:100%;' name='selasa[]'></td>",
            " <td ><input type='text' placeholder='masukan value'style='width:100%;' name='rabu[]'></td>",
            "<td ><input type='text' placeholder='masukan value'style='width:100%;' name='kamis[]'></td>",
            "<td ><input type='text' placeholder='masukan value'style='width:100%;' name='jumat[]'></td></tr>"
        ]).draw(true);

        countsave = 1;
    });

    $('#example tbody').on('click', 'input[type="checkbox"]', function (e) {
        var $row = $(this).closest('tr');
        var data = t.row($row).data();

        if (this.checked) {
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

    });

    $('#deleted').on('click', function () {

        $('input[class="cekas"]:checked').each(function () {
//                        alert('This entry will be deleted: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this
            datadel.push(this.value);



        });
        for (var i = -1; i <= $('input[class="cekas"]:checked').length; i++) {
            t.row('.selected').remove().draw(true);
        }
    });
//                
    $('#updated').on('click', function () {
        if (countsave > 0) {
            save();
            countsave = 0;
        }
        if (datadel.length > 0) {
            for (var i = 0; i <= datadel.length; i++) {
                $.ajax({
                    type: "GET",
                    url: "delete.php",
                    data: "id=" + datadel[i]
                });
            }
            datadel = [];
        }

//                    alert('a');
        $("input:checkbox.cekas").prop('checked', true);
        $('input[class="cekas"]:checked').each(function () {
//                        alert('This entry will be update: ' + this.value); // this will alert you the value what you get. After finisgin to get correct value you can delete this

            console.log($('#formtable').serialize())
            $.ajax({
                type: "post",
                url: "update.php",
                data: $('#formtable').serialize().trim()
            });

        });
        location.reload();
        $("input:checkbox.cek").prop('checked', false);
    });

});

