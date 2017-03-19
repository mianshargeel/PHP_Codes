<?php if($page != 14){?>
<footer class="footer">
	Design and Develop by HDPS
</footer>
<?php } ?>



<script src="js/script.js"></script>

  <script src="js/jquery.stickytableheaders.js"></script>

 
<script type="text/javascript" src="js/npm.js"></script>
<script src="js/functions.js"></script>

<script>
	    // adding filler rows
   
    var offset = $('.myNav').height();
    $("html:not(.legacy) table").stickyTableHeaders({fixedOffset: offset});
</script>


<script>
$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});

</script>
<script type="text/javascript" src="js/moment-with-locales.js"></script>
 <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>

  <script type="text/javascript">
        $(function() {              
           // Bootstrap DateTimePicker v4
           $('#datetimepicker2, #datetimepicker3, #datetimepicker4').datetimepicker({
                 format: 'DD-MM-YYYY'
           });
		   
		  
        });      
    </script>
    
  

</body>
</html>