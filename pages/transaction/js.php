<?php
include '../../config/koneksi.php';
include '../../function/proses.php';
include '../../function/upload.php';

$db = new Koneksi;
$koneksi = $db->DBConnect();
$proses = new Proses($koneksi);
$upload = new Upload($koneksi);

error_reporting(1);

$sql = "SELECT * FROM menu";
$menu = $proses->listData($sql);
?>
<script>
    function filterby() {
        var value = $('#filterby').val();
        if (value == 'month') {
            $('#picker').removeClass("d-none");
            $('#applyBtn').removeClass("d-none");
        } else {
            $('#picker').addClass("d-none");
            $('#applyBtn').addClass("d-none");
            $('#select1').val("");
            $('#select2').val("");
            $('#applyBtn').click();
        }
    }

    function methodpay() {
        var methodpay = $('#method').val();
        if (methodpay == 'cash') {
            var met = '';
            met += '<div>';
            met += '<div class="mb-3" id="remove-cash">';
            met += '<label>Cash</label>';
            met += '<input type="text" name="cash" class="form-control" id="dengan-rupiah" onkeyup="moneychange()">';
            met += '<small class="text-danger" id="cash-danger" style="display:none;">*Less Money</small>';
            met += '</div>';
            met += '<div class="mb-3">';
            met += '<label>Change</label>';
            met += '<input type="text" readonly name="change" class="form-control" id="change">';
            met += '</div>';
            met += '</div>';

            $('#cash').append(met);
        } else {
            $('#remove-cash').parent().remove();
        }
    }





    function moneychange() {
        var tot = $('#total').val();
        var total = tot.replace(/[a-z,A-Z,., ]/g, '');
        var totalvalue = parseInt(total);
        var cas = $('#dengan-rupiah').val();
        var cash = cas.replace(/[a-z,A-Z,., ]/g, '');
        var cashvalue = parseInt(cash);
        var change = $('#change');
        var format = $('#dengan-rupiah');
        var value = cashvalue - totalvalue;
        const formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(value);

        // Display the formatted value
        change.val(formattedValue);
        var valueformat = formatRupiah(cas, 'Rp .')
        format.val(valueformat);

        if (cashvalue < totalvalue) {
            $('#dengan-rupiah').addClass('is-invalid');
            $('#cash-danger').css('display', 'block');
        } else {
            $('#dengan-rupiah').removeClass('is-invalid');
            $('#cash-danger').css('display', 'none');
        }
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function addSelect(number) {
        var num = number + 1;
        if ($('#variation' + number + '').val() != '') {
            $('#variation' + num + '').parent().css('display', 'block');
        } else {
            $('.var').children().prop('selectedIndex', 0);
            $('.var').css('display', 'none');
        }
    }

    function order(id) {
        $('#btn-create').click();

        $.get("pages/transaction/order.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function saveOrder() {
        var qty = $('#qty').val();
        var id = $('#idmenu').val();
        var name = $('#name').val();
        var category = $('#category').val();
        var price = $('#price').val();
        var pricesel = price.replace(/[^0-9]/g, '');
        var priceint = parseInt(pricesel);
        var ice = $('#ice').val();
        var sugar = $('#sugar').val();

        var var1 = $('#variation1').val();
        var var2 = $('#variation2').val();
        var var3 = $('#variation3').val();
        var var4 = $('#variation4').val();
        var var5 = $('#variation5').val();
        var var6 = $('#variation6').val();
        var var7 = $('#variation7').val();
        var var8 = $('#variation8').val();
        var var9 = $('#variation9').val();
        var var10 = $('#variation10').val();

        var vartype1 = var1.replace(/[0-9]/g, '');
        var vartype2 = var2.replace(/[0-9]/g, '');
        var vartype3 = var3.replace(/[0-9]/g, '');
        var vartype4 = var4.replace(/[0-9]/g, '');
        var vartype5 = var5.replace(/[0-9]/g, '');
        var vartype6 = var6.replace(/[0-9]/g, '');
        var vartype7 = var7.replace(/[0-9]/g, '');
        var vartype8 = var8.replace(/[0-9]/g, '');
        var vartype9 = var9.replace(/[0-9]/g, '');
        var vartype10 = var10.replace(/[0-9]/g, '');

        var varpri1 = var1.replace(/[^0-9]/g, '');
        var varpri2 = var2.replace(/[^0-9]/g, '');
        var varpri3 = var3.replace(/[^0-9]/g, '');
        var varpri4 = var4.replace(/[^0-9]/g, '');
        var varpri5 = var5.replace(/[^0-9]/g, '');
        var varpri6 = var6.replace(/[^0-9]/g, '');
        var varpri7 = var7.replace(/[^0-9]/g, '');
        var varpri8 = var8.replace(/[^0-9]/g, '');
        var varpri9 = var9.replace(/[^0-9]/g, '');
        var varpri10 = var10.replace(/[^0-9]/g, '');
        var varprice1 = parseInt(varpri1);
        var varprice2 = parseInt(varpri2);
        var varprice3 = parseInt(varpri3);
        var varprice4 = parseInt(varpri4);
        var varprice5 = parseInt(varpri5);
        var varprice6 = parseInt(varpri6);
        var varprice7 = parseInt(varpri7);
        var varprice8 = parseInt(varpri8);
        var varprice9 = parseInt(varpri9);
        var varprice10 = parseInt(varpri10);



        if (qty == '') {
            $('#requiredqty').css('display', 'block');
        } else {
            $('#requiredqty').css('display', 'none');
        }

        if (vartype1 != '') {
            var tomenvar = priceint + varprice1;
            if (vartype2 != '') {
                var tomenvar = priceint + varprice1 + varprice2;
                if (vartype3 != '') {
                    var tomenvar = priceint + varprice1 + varprice2 + varprice3;
                    if (vartype4 != '') {
                        var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4;
                        if (vartype5 != '') {
                            var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4 + varprice5;
                            if (vartype6 != '') {
                                var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4 + varprice5 +
                                    varprice6;
                                if (vartype7 != '') {
                                    var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4 +
                                        varprice5 + varprice6 + varprice7;
                                    if (vartype8 != '') {
                                        var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4 +
                                            varprice5 + varprice6 + varprice7 + varprice8;
                                        if (vartype9 != '') {
                                            var tomenvar = priceint + varprice1 + varprice2 + varprice3 + varprice4 +
                                                varprice5 + varprice6 + varprice7 + varprice8 + varprice9;
                                            if (vartype10 != '') {
                                                var tomenvar = priceint + varprice1 + varprice2 + varprice3 +
                                                    varprice4 + varprice5 + varprice6 + varprice7 + varprice8 +
                                                    varprice9 + varprice10;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            var tomenvar = priceint;
        }


        if (qty != "") {
            var list = '';
            list += '<div class="col-lg-3 col-12" id="remove">';
            list += '<div class="small-box bg-primary text-left">';
            list += '<div class="inner">';
            list +=
                '<a href="javascript:void(0)" class="float-right cancelorder"><i class="fas fa-minus text-danger"></i></a>';
            list += '<h4 class="text-center">' + name + '</h4>';
            list += '<table><tr><th>Price</th><td>:</td><td>' + price +
                '</td></tr><tr><th>Category</th><td>:</td><td>' + category +
                '</td></tr><tr><th>Qty</th><td>:</td><td>' + qty + '</td></tr></table>';
            list += '<div class="ml-2">';
            if (category !== 'Food') {
                list += '<div class="row"><strong>' + sugar + '</strong></div><div class="row"><strong>' + ice +
                    '</strong></div>';
            }
            if (vartype1 != '') {
                list += '<div class="row"><label>Variation</label></div>';
            }
            list += '</div>';
            list += '<p>';
            if (vartype1 != '') {
                list += var1 ;
                if (var2 != '') {
                    list += " " + "&" + " " + var2 ;
                    if (var3 != '') {
                        list += " " + "&" + " " + var3 ;
                        if (var4 != '') {
                            list += " " + "&" + " " + var4 ;
                            if (var5 != '') {
                                list += " " + "&" + " " + var5 ;
                                if (var6 != '') {
                                    list += " " + "&" + " " + var6 ;
                                    if (var7 != '') {
                                        list += " " + "&" + " " + var7 ;
                                        if (var8 != '') {
                                            list += " " + "&" + " " + var8 ;
                                            if (var9 != '') {
                                                list += " " + "&" + " " + var9 ;
                                                if (var10 != '') {
                                                    list += " " + "&" + " " + var10 ;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            list += '</p>';
            list += '<input type="hidden" name="id[]" value="' + id + '">';
            list += '<input type="hidden" name="name[]" value="' + name + '">';
            list += '<input type="hidden" name="qty[]" value="' + qty + '">';
            if (category !== 'Food') {
                list += '<input type="hidden" name="ice[]" value="' + ice + '">';
                list += '<input type="hidden" name="sugar[]" value="' + sugar + '">';
            }
            list += '<input type="hidden" name="price[]" value="' + price + '">';
            list += '<input type="hidden" name="tomenvar[]" value="' + tomenvar + '">';
            list += '<input type="hidden" name="category[]" value="' + category + '">';
            list += '<input type="hidden" name="variation1[]" value="' + var1 + '">';
            list += '<input type="hidden" name="variation2[]" value="' + var2 + '">';
            list += '<input type="hidden" name="variation3[]" value="' + var3 + '">';
            list += '<input type="hidden" name="variation4[]" value="' + var4 + '">';
            list += '<input type="hidden" name="variation5[]" value="' + var5 + '">';
            list += '<input type="hidden" name="variation6[]" value="' + var6 + '">';
            list += '<input type="hidden" name="variation7[]" value="' + var7 + '">';
            list += '<input type="hidden" name="variation8[]" value="' + var8 + '">';
            list += '<input type="hidden" name="variation9[]" value="' + var9 + '">';
            list += '<input type="hidden" name="variation10[]" value="' + var10 + '">';
            list += '</div>';
            list += '</div>';
            list += '</div>';

            $('#orderForm').append(list);
            $('.close').click();
            var orval = $('#orderValue').val();
            $('#orderValue').val(parseInt(orval) + 1);
            showButton();

        }
    }

    function showButton() {
        if ($('#orderValue').val() < 2) {
            $('#order').css('display', 'none');
        } else {
            $('#order').css('display', 'block');
        }
    }

    $(document).on('click', '.cancelorder', function (e) {
        $(this).parent().parent().parent().remove();
        var orval = $('#orderValue').val();
        $('#orderValue').val(parseInt(orval) - 1);
        showButton();
    })



    function addRow() {
        var qty = parseInt($('#qty').val());
        $('#qty').val(qty + 1);



        var add = "";
        add += '<div class="row mb-3" >';
        add += '<select name="menu[]" id="menu" class="form-control col-10">';
        add += '<option value="">-- Select Menu --</option>';
        add += '<?php foreach($menu as $x) {?>';
        add += '<option value="<?= $x['
        id_menu '] ?>"><?= $x['
        menu_name '] ?> -> <?= $x['
        price '] ?></option>';
        add += '<?php } ?>';
        add += '</select>';
        add +=
            '<a href="javascript:void(0)" class="col-1" onclick="addRow()"><i class="fas fa-plus text-info"></i></a>';
        add += '<a href="javascript:void(0)" class="col-1 remove"><i class="fas fa-minus text-danger"></i></a>';
        add += '</div>';
        $('#transmenu').append(add);
    }

    $(document).on('click', '.remove', function (e) {
        $(this).parent().remove();
        var qty = parseInt($('#qty').val());
        $('#qty').val(qty - 1);
    })


    function read() {
        $.get("pages/transaction/read.php", {}, function (data, status) {
            $("#read").html(data);
        });

    }

    function showHistory() {
        $.get("pages/transaction/history.php", {}, function (data, status) {
            $("#read").html(data);
            $('#backread').css('display', 'block');
            $('#printhistory').css('display', 'block');
            $('#filterbypicker').removeClass("d-none");
            $('#showhistory').css('display', 'none');
            $('#remove').remove();
            var orval = $('#orderValue').val();
            var awal = parseInt(orval) - 1;
            $('#orderValue').val(parseInt(orval) - awal);
            showButton();
        });
    }

    function storeprint() {
        var method = $('#method').val();

        var mesalert = "Less Money";

        if (method == 'cash') {
            var tot = $("#total").val();
            var total = tot.replace(/[a-z,A-Z,., ]/g, '')
            var totalvalue = parseInt(total);
            var cas = $('#dengan-rupiah').val();
            var cash = cas.replace(/[a-z,A-Z,., ]/g, '');
            var cashvalue = parseInt(cash);


            if (cashvalue >= totalvalue) {
                store();
                setTimeout(function () {
                    read();
                    $('#butPrint').click();
                }, 1500);
            } else {
                actionAlert(mesalert);
            }
        } else {
            store();
            setTimeout(function () {
                read();
                $('#butPrint').click();
            }, 1500);
        }






    }

    function butPrint(id) {
        window.open("pages/transaction/print.php?id=" + id + "");
    }

    // function remvorder(){
    // }

    function applyFilter() {
        var v1 = $('#select1').val();
        var v2 = $('#select2').val();

        if (v1 != '' && v2 != '') {
            $.get("pages/transaction/history.php?begin=" + v1 + "&end=" + v2 + "", {}, function (data, status) {
                $("#read").html(data);
            });
        } else {
            $.get("pages/transaction/history.php", {}, function (data, status) {
                $("#read").html(data);
            });
        }
    }

    function backRead() {
        read();
        $('#backread').css('display', 'none');
        $('#printhistory').css('display', 'none');
        $('#filterbypicker').addClass("d-none");
        $('#showhistory').css('display', 'block');
        $('#picker').addClass('d-none');
        $('#filterby').val('');
        $('#select1').val('');
        $('#select2').val('');

    }

    function detailData(id) {
        $.get("pages/transaction/detail.php?id=" + id + "", {}, function (data, status) {
            $("#read").html(data);
            $('#backread').css('display', 'block');
            $('#showhistory').css('display', 'block');
            $('#printhistory').css('display', 'none');
            $('#filterbypicker').addClass('d-none');
            $('#picker').addClass('d-none');
            $('#filterby').val('');
            $('#select1').val('');
            $('#select2').val('');
        });
    }

    function createOrder() {
        $('#btn-create').click();
        var value = $('#orderForm').serialize();
        $.get("pages/transaction/create.php?" + value + "", {}, function (data, status) {
            $("#modal").html(data);
            methodpay();
        });
    }


    function store() {
        var method = $('#method').val();
        var data = $('#dataStore').serialize();
        var message = "Successfully Create Data";
        var mesalert = "Less Money";


        if (method == 'cash') {
            var tot = $("#total").val();
            var total = tot.replace(/[a-z,A-Z,., ]/g, '')
            var totalvalue = parseInt(total);
            var cas = $('#dengan-rupiah').val();
            var cash = cas.replace(/[a-z,A-Z,., ]/g, '');
            var cashvalue = parseInt(cash);

            if (cashvalue >= totalvalue) {
                $.ajax({
                    type: "GET",
                    url: "pages/transaction/read.php?action=store",
                    data: data,
                    typeData: "json",
                    success: function (response) {
                        read();
                        $('.close').click();
                        actionAlert(message);
                        $('#remove').remove();
                        var orval = $('#orderValue').val();
                        var awal = parseInt(orval) - 1;
                        $('#orderValue').val(parseInt(orval) - awal);
                        showButton();
                        readBalance();
                    }
                })
            } else {
                actionAlert(mesalert);
            }
        } else {
            $.ajax({
                type: "GET",
                url: "pages/transaction/read.php?action=store",
                data: data,
                typeData: "json",
                success: function (response) {
                    read();
                    $('.close').click();
                    actionAlert(message);
                    $('#remove').remove();
                    var orval = $('#orderValue').val();
                    var awal = parseInt(orval) - 1;
                    $('#orderValue').val(parseInt(orval) - awal);
                    showButton();
                    readBalance();
                }
            })
        }


    }

    function editModal(id) {
        $('#btn-create').click();

        $.get("pages/transaction/edit.php?id=" + id + "", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function deleteData(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var message = "Successfully Deleted Data";
                $.get("pages/transaction/read.php?action=delete&id=" + id + "", {}, function (data, status) {
                    readBalance();
                    history();
                    actionAlert(message);
                });
            }
        })
    }

    function deleteDatabal(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var message = "Successfully Deleted Data";
                $.get("pages/transaction/read.php?action=deletebal&id=" + id + "", {}, function (data, status) {
                    readBalance();
                    history();
                    actionAlert(message);
                });
            }
        })
    }

    function history() {
        $.get("pages/transaction/history.php", {}, function (data, status) {
            $("#read").html(data);
            $('#backread').css('display', 'block');
            $('#showhistory').css('display', 'none');
        });
    }

    function exportdata() {
        var select = $('#filterby').val();
        var v1 = $('#select1').val();
        var v2 = $('#select2').val();
        if (select == 'month') {
            var url = "pages/transaction/report.php?begin=" + v1 + "&end=" + v2 + "";
            window.open(url, "_blank");

        } else {
            var url = "pages/transaction/report.php";
            window.open(url, "_blank");
        }
    }

    function actionAlert(message) {
        toastr.info(message)
    }
</script>