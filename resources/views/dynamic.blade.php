
<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
<table border="1" id="mtable">
    <thead>
      <tr>
        <td>Slot 1</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" value = "0"/>
        <br/><br/>
        <input type="text" value = "0"/></td>
      </tr>
    </tbody>
</table><br/><br/>
<button id="add">ADD</button><br/><br/>

<script>
$('#add').click(function(){
var size = $('#mtable thead tr>td').length + 1;

/* var c =  $('#mtable thead tr>td:last').html();
 var b = parseInt(c) + 1; */
 $('#mtable thead tr').append($("<td></td>"));
 $('#mtable thead tr>td:last').html('slot'+' ' + size)
 $('#mtable tbody tr').append($("<td><input type='text' value ='0' /><br/><br/><input type='text' value = '0'/></td>"));
});
</script>
