$(document).ready(function () {
$.ajax({
    url:"select.php",
    dataType:"text",
    success:function (data) {
        x = data.split("\n");
        if (Array.isArray(x) && (x[0] != "")) {
            for (i = 0; i < x.length; i++) {
                tmp = x[i].split(";");
                new_el(tmp[1], tmp[0]);
            }
        }
    }
})
});
function newtodo() {
    todo = prompt("Enter new to do");
    todo = todo.trim();
    if (todo != null)
        new_el(todo);
}
function new_el(todo, todo_id) {
    if (todo != null && todo != "") {
        $('#ft_list').prepend($('<div>' + todo + '</div>').click(function () {
            ans = confirm("Are you sure?");
            if (ans == true) {
                this.remove();
                data = this.innerHTML;
                $.ajax({
                    type: "GET",
                    url: "delete.php",
                    data: {data},
                    success: function () {
                    }
                });
            }
        }));
        if (todo_id == null) {
            $.ajax({
                type: "GET",
                url: "insert.php",
                data: {todo}
            });
        }
    }
}
