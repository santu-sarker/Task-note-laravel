$(document).ready(function () {
    var table = $("#task-table").DataTable();
    table.on("click", ".edit_modal", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev("parent");
        }

        var data = table.row($tr).data();
        console.log(data);
        $("#task_title").val(data[2]);
        $("#task_description").val(data[3]);
        $("#edit_form").attr("action", "/user/task/" + data[0]);
        console.log($("#edit_form").attr("action"));
        $("#edit_task").modal("show");
    });

    table.on("click", ".delete_modal", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev("parent");
        }

        var data = table.row($tr).data();
        console.log(data);

        $("#delete_form").attr("action", "/user/task/" + data[0]);
        console.log($("#delete_form").attr("action"));
        $("#delete_task").modal("show");
    });
    table.destroy();
    $("#task-table").DataTable({
        order: [[1, "asc"]],
    });
});
