<script>

    function read() {
        $.get("pages/menu/read.php", {}, function (data, status) {
            $("#read").html(data);
        });
    }

    function createModal() {
        $('#btn-create').click();
        $.get("pages/menu/create.php", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function store(){
        var data = $('#dataStore').serialize();
        $.ajax({
            type: "POST",
            url: "pages/menu/read.php?action=store",
            data: data,
            typeData: "json",
            success: function (response) {
            read();
            $('.close').click();
            }
        })
    }

    function editModal(id){
        $('#btn-create').click();
        
        $.get("pages/menu/edit.php?id="+id+"", {}, function (data, status) {
            $("#modal").html(data);
        });
    }

    function update(){
        var data = $('#dataStore').serialize();
        $.ajax({
            type: "POST",
            url: "pages/menu/read.php?action=update",
            data: data,
            typeData: "json",
            success: function (response) {
            read();
            $('.close').click();
            }
        })
    }

    function deleteData(id){
        $.get("pages/menu/read.php?action=delete&id="+id+"", {}, function (data, status) {
            read();
        });
    }
</script>

