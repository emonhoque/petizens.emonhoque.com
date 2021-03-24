function locfunction() {
  var input = document.getElementById("searchloc");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName("target");

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "table-row";
    } else {
      nodes[i].style.display = "none";
    }
  }
}
