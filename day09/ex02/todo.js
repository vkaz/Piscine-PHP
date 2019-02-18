window.onload = function () {
    var x = document.cookie.split(";");
    if (Array.isArray(x) && x[0] != "") {
        for (i = 0; i < x.length; i++) {
            tmp = x[i].split("=");
            new_el(tmp[1], tmp[0]);
        }
    }
}
function del() {
    var ans = confirm("Are you sure?");
    if (ans == true) {
        this.parentNode.removeChild(this);
    }
}
function newtodo() {
    var todo = prompt("Enter new to do");
    todo = todo.trim();
    if (todo != "" && todo != null)
        new_el(todo);
}
function new_el(todo, todo_n) {
    var div = document.createElement("DIV");
    div.innerHTML = "<div>" + todo + "</div>";
    document.getElementById("ft_list").insertBefore(div, document.getElementById("ft_list").firstChild);
    div.addEventListener("click", del);
    div.addEventListener("click", function() {del_cook(todo, todo_n);});
    var data = new Date(new Date().getTime() + 24 * 3600 * 1000);
    if (todo_n == null)
        todo_n = todo + Math.random();
    document.cookie = todo_n + "=" + todo + "; expires=" + data + ";";
}
function del_cook(todo, todo_n) {
    document.cookie = todo_n + "=" + todo + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}
