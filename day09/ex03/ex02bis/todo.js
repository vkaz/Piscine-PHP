$(document).ready(function () {
    if (Array.isArray(x = document.cookie.split(";")) && (x[0] != "")) {
        for (i = 0; i < x.length; i++) {
            tmp = x[i].split("=");
            new_el(tmp[1]);
        }
    }
});
function newtodo() {
    todo = prompt("Enter new to do");
    todo = todo.trim();
    if (todo != null)
        new_el(todo);
}
function new_el(todo) {
    $('#ft_list').prepend($('<div>' + todo + '</div>').click(function() {
        ans = confirm("Are you sure?");
        if (ans == true) {
            this.parentNode.removeChild(this);
            document.cookie = this.innerHTML + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        }
    }));
    data = new Date(new Date().getTime() + 24 * 3600 * 1000);
    document.cookie = todo + "=" + todo + "; expires=" + data + ";";
}
