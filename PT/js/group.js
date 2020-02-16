function displayDiv($arg) {
    var $divName = $arg.toString();
    var $doc = document.getElementById($divName);

    if ($doc.style.display === '' || $doc.style.display === 'none') {
        $doc.style.display = 'block';
    } else {
        $doc.style.display = 'none';
    }

}


function val() {
    $('#category2').empty();
    $('#category option').clone().appendTo('#category2');
    var selected = document.getElementById("category").value;
    $('#category2 option[value="' + selected + '"]').remove();
    var delPlaceHolder = document.getElementById("category2");
    delPlaceHolder.remove(0);
    var opt = document.createElement('Catégorie 2');
    opt.value = "";
    delPlaceHolder.appendChild(opt);
}