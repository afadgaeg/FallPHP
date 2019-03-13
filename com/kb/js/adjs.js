$(".global_addata").each(function () {
    var $this = $(this);
    var id = $this.attr("id");
    var $a = $("#" + id.slice(0, -1));
    if ($a.length > 0) {
        $a.html($this.html());
    }
    $this.html("");
});